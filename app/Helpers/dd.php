<style>

    .error{
        color: green;
    }

</style>
<?php
 
class dd
{   
    
    public static function arrv($value){

        ?><pre class="error">

        <?php 
        var_dump($value);
        ?>

        </pre>
        <?php 
        

        die();

    }

    public static function arrp($value){

        ?><pre class="error">

        <?php 
        print_r($value);
        ?>

        </pre>
        <?php 
        

        die();

    }
}