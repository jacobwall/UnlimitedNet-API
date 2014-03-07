<?php
    $key = '0csq4dt9pj2dor0serckjtu2eg5wh3moeynnyirpfmhp28ci2wz6q7mqrzv157b1ofwk8kuit29tmgghdwwlsul3q7wzzr0nfztdnsiolqfy9zxx2ywq2n89ty9vmyrp';
    $data = file_get_contents('https://panel.unlimitednet.us/api.php?key='.$key.'&service=wholesale_voip&cmd=cdr');
    unset($key);
    if (ereg('Error: ', $data)) {
        $error = explode('Error: ', $data);
        $error = $error[1];
        echo $error;
    }else{
        $dids = explode("\n", $data);
        
        if (is_array($dids))
            echo "<ul>\n";
            foreach ($dids as $did) {
        $cols = explode(',', $did);
                echo "<li>{$did[3]}</li>\n";
                echo "<li>$did</li>\n";
            }
            echo "</ul>\n";
        }
    }
    ?>
