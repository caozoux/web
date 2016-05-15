<html>
    <head><title>select title</title></head>
    <?php
        $attrs=$_GET['attibutes'];
        if (!is_null($attrs)) {
            $attrs=array();
        }

        /* dyna create the select input*/
        function make_checkboxes ($name,$query, $options) {
            foreach($options as $value => $label) {
                printf('%s <input type="checkbox" name="%s[]" value="%s"></input>',
                    $label, $name, $value);
                if (in_array($value, $query)) {
                    echo "checked";
                }
                echo "<br/>";
            }
        }

        $personalicy_attributes=array (
            'perky'     => 'perky',
            'morose'    => 'Morose',
            'thinking'  => 'Thinking',
        );
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="GET">
        Select you personality attributes:<br />
        <?php make_checkboxes('attribute', $arrs, $personalicy_attributes) ?>
        <input type="submit" name="s" value="Recoard"></input>
    <?php   
        if (array_key_exists('s', $_GET)) {
            $description = join(" ", $_GET['attibutes']);
            echo "you have select $description";
        }
    ?>
    </form>
</html>
