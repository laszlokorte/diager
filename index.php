<?php

define('GENERATE_OUT', true);
define('VALIDATE_OUT', true);

require_once './level0/generator.php';
require_once './level0/schema.php';
$level0 = require_once './level0/self.php';
require_once './level0/validator.php';

$level0Validator = new Level0\Validator();
if(VALIDATE_OUT) echo $level0Validator->validate($level0, $level0) ? 'VALID' : 'INVALID', PHP_EOL;
$level0Generator = new Level0\Generator();
if(GENERATE_OUT) echo $level0Generator->generate($level0);





require_once './level1/generator.php';
require_once './level1/schema.php';
$level1 = require_once './level1/self.php';
$level1to0 = require_once './level1/level0.php';
$level1to2 = require_once './level1/level2.php';
require_once './level1/validator.php';

$level1Validator = new Level1\Validator();
if(VALIDATE_OUT) echo $level1Validator->validate($level1, $level1) ? 'VALID' : 'INVALID', PHP_EOL;
$level1Generator = new Level1\Generator();
if(GENERATE_OUT) echo $level1Generator->generate($level1), PHP_EOL;

$level1to0Generator = new Level1\Generator('Level0');
if(GENERATE_OUT) echo $level1to0Generator->generate($level1to0), PHP_EOL;

$level1to2Generator = new Level1\Generator('Level2');
if(GENERATE_OUT) echo $level1to2Generator->generate($level1to2), PHP_EOL;



require_once './level2/generator.php';
require_once './level2/schema.php';
$level2 = require_once './level2/self.php';
$level2to1 = require_once './level2/level1.php';
require_once './level2/validator.php';

$level2Validator = new Level2\Validator();
if(VALIDATE_OUT) echo $level2Validator->validate($level2, $level2) ? 'VALID' : 'INVALID', PHP_EOL;
$level2Generator = new Level2\Generator();
if(GENERATE_OUT) echo $level2Generator->generate($level2), PHP_EOL;

$level2to1Generator = new Level2\Generator('Level1');
if(GENERATE_OUT) echo $level2to1Generator->generate($level2to1), PHP_EOL;





require_once './level3/generator.php';
require_once './level3/schema.php';
$level3 = require_once './level3/self.php';
$level3to2 = require_once './level3/level2.php';
$level3to1 = require_once './level3/level1.php';
$level3to0 = require_once './level3/level0.php';
$level3to4 = require_once './level3/level4.php';
require_once './level3/validator.php';

$level3Validator = new Level3\Validator();
if(VALIDATE_OUT) echo $level3Validator->validate($level3, $level3) ? 'VALID' : 'INVALID', PHP_EOL;
$level3Generator = new Level3\Generator();
if(GENERATE_OUT) echo $level3Generator->generate($level3), PHP_EOL;

$level3to2Generator = new Level3\Generator('Level2');
if(GENERATE_OUT) echo $level3to2Generator->generate($level3to2), PHP_EOL;

$level3to1Generator = new Level3\Generator('Level1');
if(GENERATE_OUT) echo $level3to1Generator->generate($level3to1), PHP_EOL;

$level3to0Generator = new Level3\Generator('Level0');
if(GENERATE_OUT) echo $level3to0Generator->generate($level3to0), PHP_EOL;

$level3to4Generator = new Level3\Generator('Level4');
if(GENERATE_OUT) echo $level3to4Generator->generate($level3to4), PHP_EOL;





require_once './level4/generator.php';
require_once './level4/schema.php';
$level4 = require_once './level4/self.php';
require_once './level4/validator.php';

$level4Validator = new Level4\Validator();
if(VALIDATE_OUT) echo $level4Validator->validate($level4, $level4) ? 'VALID' : 'INVALID', PHP_EOL;
$level4Generator = new Level4\Generator();
if(GENERATE_OUT) echo $level4Generator->generate($level4), PHP_EOL;
