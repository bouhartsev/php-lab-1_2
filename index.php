<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Бухарцев Матвей, lab 1_2</title>
</head>
<body>
    <header>
        <a href="/"><img src="img/Mospolytech_logo.jpg" alt="Mospolytech"></a>
        <h1>Бухарцев Матвей, Условия в алгоритмах. Табулирование функции</h1>
    </header>
    <main>
		<?php
            $type = 'A';
            $min_x = -10;
            $iterations = 10;
            $step = 2;

            function calc($x) {
                $ans='Error';
                if ($x<=10) $ans=3*pow($x, 3) + 2;
                else if ($x<20) $ans=5*$x + 7;
                else $ans=x/(22-x) - x;
                
                if ($x==22 || $ans>5000 || $ans<-5000) return 'Error';
                else return $ans;
                
            }
            function showA($x) {
                echo 'f('.$x.')='.calc($x).'<br>';
            }
            function showBC($x) {
                echo '<li>f('.$x.')='.calc($x).'</li>';
            }
            function showD($x, $i) {
                echo '<tr><td>'.($i+1).'</td><td>'.$x.'</td><td>'.calc($x).'</td></tr>';
            }
            function showE($x) {
                echo '<div>f('.$x.')='.calc($x).'</div>';
            }
            
            function readParams() {
                global $type, $min_x, $iterations, $step;

                if (isset($_GET['type'])) {
                    $type = $_GET['type'];
                }
                if (isset($_GET['min_x'])) {
                    $min_x = $_GET['min_x'];
                }
                if (isset($_GET['iterations'])) {
                    $iterations = $_GET['iterations'];
                }
                if (isset($_GET['step'])) {
                    $step = $_GET['step'];
                }
            }

            function mainShow() {
                global $type, $min_x, $iterations, $step;
                if($type=='B') echo '<ul>';
                else if($type=='C') echo '<ol>';
                else if($type=='D') {
                    echo '<table>';
                    echo '<tr><th>№</td><td>x</td><td>f(x)</td></tr>';
                }
                $x=$min_x;
                for ($i = 0; $i < $iterations; $i++, $x+=$step) {
                    switch($type){
                        case 'A':
                            showA($x);
                            break;
                        case 'B':
                            showBC($x);
                            break;
                        case 'C':
                            showBC($x);
                            break;
                        case 'D':
                            showD($x, $i);
                            break;
                        case 'E':
                            showE($x);
                            break;
                        default:
                            showA($x);
                            break;
                    }
                }

                if($type=='B') echo '</ul>';
                else if($type=='C') echo '</ol>';
                else if($type=='D') echo '</table>';
            }

            readParams();
        ?>
        <form action="./">
            <label for="type">Type of layout </label>
            <select name="type" id="type">
                <option <?php if($type=='A') echo 'selected'; ?>>A</option>
                <option <?php if($type=='B') echo 'selected'; ?>>B</option>
                <option <?php if($type=='C') echo 'selected'; ?>>C</option>
                <option <?php if($type=='D') echo 'selected'; ?>>D</option>
                <option <?php if($type=='E') echo 'selected'; ?>>E</option>
            </select>
            <label for="min_x">Min X </label>
            <input type='number' name="min_x" id="min_x" value="<?php echo $min_x; ?>" required>
            <label for="iterations">Iterations </label>
            <input type='number' name="iterations" id="iterations" value="<?php echo $iterations; ?>" required>
            <label for="step">Step (difference)</label>
            <input type='number' name="step" id="step" value="<?php echo $step; ?>" required>
            <input type="submit" value="Пересобрать">
        </form>
        <div class="funcBlock">
            <?php 
                mainShow();
            ?>
        </div>
    </main>
    <footer>
        Матвей Бухарцев
    </footer>
</body>
</html>