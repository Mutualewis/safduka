<?php

namespace Ngea\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
            
    //     if($e instanceof HttpException 
    //     && $e->getStatusCode() == 403) {
    //     return response()->view('errors.403', [], 403);
    //     }

    //     $user_data = Auth::user();
	//     $user = $user_data ->usr_name;


    //     $data = array('name'=>"TZ DATABASE", "info"=>$e->getMessage());    
    //     //dump($e->getLine()); exit;
    //     //dump($data); exit;
    //     $data = array('name'=>"TZ DATABASE TEAM", "error"=>$e->getMessage(), "user"=>$user, "line"=>$e->getLine(), "file"=>$e->getFile());    

    //     Mail::send(['text'=>'systemerrormail'], $data, function($message) {

    //         $message->to('john.gachunga@nkg.coffee', 'Tanzania Database Error-')
    //         ->cc('lewis.mutua@nkg.coffee')
    //         ->subject('TZ DATABASE SYSTEM EXCEPTION');

    //         $message->from('lewis.mutua@nkg.coffee','Ibero Tz Database');

    //     });
	// 	if( count(Mail::failures()) > 0 ) {

		 	
		 
	// 	 } else {
			
			
    //      }
         
       return parent::render($request, $e);
       //return response()->view('errors.500');
    }
}
