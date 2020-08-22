<?php
    namespace App;
    use Illuminate\Support\Facades\Facade;


class ExampleFacades extends Facade{


    protected static Function getFacadeAccessor(){

        return 'example';
    }
    }

?>
