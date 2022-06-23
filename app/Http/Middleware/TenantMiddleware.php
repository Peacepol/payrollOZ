<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Artisan;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request->route("tenantcode"));
        $sql = "select * from tenants where tenantcode = '".$request->route("tenantcode")."'";
        $tenants = DB::select($sql);
    if (count($tenants)){
        foreach($tenants as $tenant){
                
                 $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME =  ?";
                    $db = DB::select($query, [$tenant->dbname]);
                    if (empty($db)) {
                        //echo 'No db exist of that name!';
                        \DB::statement('create database '.$tenant->dbname.';');//create database
                        
                        \Config::set('database.connections.mysql', [
                                        'driver' => 'mysql',
                                        'url' => NULL,
                                        'host' => $tenant->dbserver,
                                        'port' => '3306',
                                        'database' => $tenant->dbname,
                                        'username' => $tenant->dbuser,
                                        'password' => $tenant->dbpassword,
                                        'charset' => 'utf8',
                                        'prefix' => '',
                                        'prefix_indexes' => TRUE,
                                    ]);
                                DB::purge('mysql');
                                DB::connection('mysql');  
                                  
                         Artisan::call("migrate --path=database/migrations/tenant");
                          Artisan::call("db:seed");
                                  
                           

                    } else {
                       //echo 'db already exists!';
                          
                        \Config::set('database.connections.mysql', [
                                        'driver' => 'mysql',
                                        'url' => NULL,
                                        'host' => $tenant->dbserver,
                                        'port' => '3306',
                                        'database' => $tenant->dbname,
                                        'username' => $tenant->dbuser,
                                        'password' => $tenant->dbpassword,
                                        'charset' => 'utf8',
                                        'prefix' => '',
                                        'prefix_indexes' => TRUE,
                                    ]);
                                DB::purge('mysql');
                                DB::connection('mysql');  
                                  
                         Artisan::call("migrate --path=database/migrations/tenant");
                                  
                    }
                
                
            return $next($request);
        }
    }else{
    dd("Tenant Middleware Error");
    abort(404);
    }
        

    }
}
