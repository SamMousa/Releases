<?php
namespace ls\controllers;
use \Yii;
class DevController extends \CController {
    
    public function actionIndex() {
        return 'noo';
        $timings = [];
        for($r = 0; $r < 10000; $r++) {
            for ($l = 1; $l < 5; $l = $l + 5) {
                
                // Create 1000 random arrays.
                $input = [];
                for ($i = 0; $i < 1000; $i++) {
                    $row = [];
                    for ($f = 0; $f <= $l; $f++) {
                        $row[$f] = md5(mt_rand(0, 1000) . microtime());
                    }
                    $input[$i] = $row;
                }

                $json = array_map('json_encode', $input);


                $start = microtime(true);
                $jsonData = [];
                foreach($json as $i => $jsonString) {
                    // We test json decoding the data.
                    // We also create an object to make it fairer since yii woudl create one object for the model as well.
                    $c = new \stdClass();
                    $c->value = $jsonString;
                    $c->key = $i;
                    $jsonData[] = json_decode($jsonString, true);
                }
                $timings['json'][$l][] = microtime(true) - $start;

                $start = microtime(true);
                $objData = [];
                foreach($input as $i => $arrayData) {
                    foreach($arrayData as $key => $value) {
                        /*
                         * We test instantiating an object, in reality this will be slower because:
                         * - Yii uses more complicated objects
                         * - Yii uses __get and __set to store the values in an array.
                         */
                        $c = new \stdClass();
                        $c->value = $value;
                        $c->key = $key;
                        $objData[] = $c;
                    }

                }

                $timings['obj'][$l][] = microtime(true) - $start;
                
            }

        }
        echo "<h1>Executed $r repetitions:</h1>";
        echo '<table>';
        echo '<tr>';
        echo \CHtml::tag('th', [], 'Type');
        echo \CHtml::tag('th', [], 'Number of attributes');
        echo \CHtml::tag('th', [], 'Average');
        echo \CHtml::tag('th', [], 'Maximum');
        echo \CHtml::tag('th', [], 'Minimum');
        echo '</tr>';
        foreach($timings as $type => $details) {
            foreach ($details as $size => $durations) {
                echo '<tr>';
                echo \CHtml::tag('td', [], $type);
                echo \CHtml::tag('td', [], $size);
                echo \CHtml::tag('td', [], number_format(array_sum($durations) / count($durations), 4));
                echo \CHtml::tag('td', [], number_format(max($durations), 4));
                echo \CHtml::tag('td', [], number_format(min($durations), 4));
                echo '</tr>';
            }
        }
        echo '</table>';
        
        
    }
    public function actionMigrateTest() {
        App()->loadHelper('globalsettings');
        var_dump(getUpdateInfo());
        $zip = new \ZipArchive();
        $zip->open('/home/sam/Downloads/limesurvey205plus-build150211.zip');
        $zip2 = new \ZipArchive();
        $zip2->open('/tmp/new.zip');
        
        // Hashes:
        $hashesFrom = [];
        $hashesTo = [];
        $count = $zip->numFiles;
        $start = microtime(true);
        for ($i = 0; $i < $count; $i++) {
            $hashesFrom[$zip->getNameIndex($i)] = md5($zip->getFromIndex($i));
        }
        $count2 = $zip2->numFiles;
        
        var_dump($count2);
        for ($i = 0; $i < $count2; $i++) {
            $hashesTo[$zip2->getNameIndex($i)] = md5($zip2->getFromIndex($i));
        }
        
        // Deleted files:
        $deleted = array_diff_key($hashesFrom, $hashesTo);
        
        // Created files:
        $created = array_diff_key($hashesTo, $hashesFrom);
        
        // Changed files:
        $changed = [];
        foreach($hashesFrom as $file => $hash) {
            if (isset($hashesTo[$file]) && $hashesTo[$file] != $hash) {
                $changed[$file] = $hash;
            }
        }
         
        echo "Deleted " . count($deleted) ." files.<br>";
//        var_dump($deleted);
        echo "Created " . count($created) ." files.<br>";
//        var_dump($created);
        echo "Changed " . count($changed) ." files.<br>";
//        var_dump($changed);
        echo "Source files: " . $zip->numFiles;
        echo "Target files: " . $zip2->numFiles;
        
        $end = microtime(true) - $start;
        var_dump($end);

        
    }
    
    public function actionModule() {
        $id = array_keys(App()->modules)[0];
//        die(App()->createUrl("$id/dashboard"));
    }
}