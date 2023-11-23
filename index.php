<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SchmeER</title>
	<link rel="icon" href="favicon.svg">

	<style>
		pre {
			max-height: 5em;
			overflow: auto;
			margin: 2em;
			border: 2px solid #aaa;
		}

		svg {
			max-height: 8em;
			display: block;
			width: 100%;
			border: 1px solid #ddd;
		}
	</style>
</head>
<body>
	
	<?php
	function h($t) {
		return htmlentities($t);
	}

	error_reporting(E_STRICT|E_ALL);

	define('GENERATE_OUT', true);
	define('VALIDATE_OUT', true);
	define('GENERATE_PLOT', true);

	require_once './level0/generator.php';
	require_once './level0/schema.php';
	$level0 = require_once './level0/self.php';
	require_once './level0/validator.php';
	require_once './level0/plotter.php';

	$level0Validator = new Level0\Validator();
	if(VALIDATE_OUT) echo h($level0Validator->validate($level0, $level0) ? 'VALID' : 'INVALID'), PHP_EOL;
	$level0Generator = new Level0\Generator();
	if(GENERATE_OUT) echo '<details><summary>level0Generator</summary><pre>', h($level0Generator->generate($level0)), PHP_EOL, '</pre></details>';

	$level0Plotter = new Level0\Plotter();
	if(GENERATE_PLOT) echo $level0Plotter->svg($level0);





	require_once './level1/generator.php';
	require_once './level1/schema.php';
	$level1 = require_once './level1/self.php';
	$level1to0 = require_once './level1/level0.php';
	$level1to2 = require_once './level1/level2.php';
	require_once './level1/validator.php';

	$level1Validator = new Level1\Validator();
	if(VALIDATE_OUT) echo h($level1Validator->validate($level1, $level1) ? 'VALID' : 'INVALID'), PHP_EOL;
	$level1Generator = new Level1\Generator();
	if(GENERATE_OUT) echo '<details><summary>level1Generator</summary><pre>', h($level1Generator->generate($level1)), PHP_EOL, '</pre></details>';

	$level1to0Generator = new Level1\Generator('Level0');
	if(GENERATE_OUT) echo '<details><summary>level1to0Generator</summary><pre>', h($level1to0Generator->generate($level1to0)), PHP_EOL, '</pre></details>';

	$level1to2Generator = new Level1\Generator('Level2');
	if(GENERATE_OUT) echo '<details><summary>level1to2Generator</summary><pre>', h($level1to2Generator->generate($level1to2)), PHP_EOL, '</pre></details>';


	require_once './level1/plotter.php';
	$level1Plotter = new Level1\Plotter();
	if(GENERATE_PLOT) echo $level1Plotter->svg($level1);


	require_once './level2/generator.php';
	require_once './level2/schema.php';
	$level2 = require_once './level2/self.php';
	$level2to1 = require_once './level2/level1.php';
	require_once './level2/validator.php';

	$level2Validator = new Level2\Validator();
	if(VALIDATE_OUT) echo h($level2Validator->validate($level2, $level2) ? 'VALID' : 'INVALID'), PHP_EOL;
	$level2Generator = new Level2\Generator();
	if(GENERATE_OUT) echo '<details><summary>level2Generator</summary><pre>', h($level2Generator->generate($level2)), PHP_EOL, '</pre></details>';

	$level2to1Generator = new Level2\Generator('Level1');
	if(GENERATE_OUT) echo '<details><summary>level2to1Generator</summary><pre>', h($level2to1Generator->generate($level2to1)), PHP_EOL, '</pre></details>';


	require_once './level2/plotter.php';
	$level2Plotter = new Level2\Plotter();
	if(GENERATE_PLOT) echo $level2Plotter->svg($level2);



	require_once './level3/generator.php';
	require_once './level3/schema.php';
	$level3 = require_once './level3/self.php';
	$level3to2 = require_once './level3/level2.php';
	$level3to1 = require_once './level3/level1.php';
	$level3to0 = require_once './level3/level0.php';
	$level3to4 = require_once './level3/level4.php';
	require_once './level3/validator.php';

	$level3Validator = new Level3\Validator();
	if(VALIDATE_OUT) echo h($level3Validator->validate($level3, $level3) ? 'VALID' : 'INVALID'), PHP_EOL;
	$level3Generator = new Level3\Generator();
	if(GENERATE_OUT) echo '<details><summary>level3Generator</summary><pre>', h($level3Generator->generate($level3)), PHP_EOL, '</pre></details>';

	$level3to2Generator = new Level3\Generator('Level2');
	if(GENERATE_OUT) echo '<details><summary>level3to2Generator</summary><pre>', h($level3to2Generator->generate($level3to2)), PHP_EOL, '</pre></details>';

	$level3to1Generator = new Level3\Generator('Level1');
	if(GENERATE_OUT) echo '<details><summary>level3to1Generator</summary><pre>', h($level3to1Generator->generate($level3to1)), PHP_EOL, '</pre></details>';

	$level3to0Generator = new Level3\Generator('Level0');
	if(GENERATE_OUT) echo '<details><summary>level3to0Generator</summary><pre>', h($level3to0Generator->generate($level3to0)), PHP_EOL, '</pre></details>';

	$level3to4Generator = new Level3\Generator('Level4');
	if(GENERATE_OUT) echo '<details><summary>level3to4Generator</summary><pre>', h($level3to4Generator->generate($level3to4)), PHP_EOL, '</pre></details>';

	require_once './level3/plotter.php';
	$level3Plotter = new Level3\Plotter();
	if(GENERATE_PLOT) echo $level3Plotter->svg($level3);



	require_once './level4/generator.php';
	require_once './level4/schema.php';
	$level4 = require_once './level4/self.php';
	require_once './level4/validator.php';
	$level4to3 = require_once './level4/level3.php';
	$level4to2 = require_once './level4/level2.php';
	$level4to1 = require_once './level4/level1.php';
	$level4to0 = require_once './level4/level0.php';
	$level4to5 = require_once './level4/level5.php';

	$level4Validator = new Level4\Validator();
	if(VALIDATE_OUT) echo h($level4Validator->validate($level4, $level4) ? 'VALID' : 'INVALID'), PHP_EOL;
	$level4Generator = new Level4\Generator();
	if(GENERATE_OUT) echo '<details><summary>level4Generator</summary><pre>', h($level4Generator->generate($level4)), PHP_EOL, '</pre></details>';

	$level4to3Generator = new Level4\Generator('Level3');
	if(GENERATE_OUT) echo '<details><summary>level4to3Generator</summary><pre>', h($level4to3Generator->generate($level4to3)), PHP_EOL, '</pre></details>';

	$level4to2Generator = new Level4\Generator('Level2');
	if(GENERATE_OUT) echo '<details><summary>level4to2Generator</summary><pre>', h($level4to2Generator->generate($level4to2)), PHP_EOL, '</pre></details>';

	$level4to1Generator = new Level4\Generator('Level1');
	if(GENERATE_OUT) echo '<details><summary>level4to1Generator</summary><pre>', h($level4to1Generator->generate($level4to1)), PHP_EOL, '</pre></details>';

	$level4to0Generator = new Level4\Generator('Level0');
	if(GENERATE_OUT) echo '<details><summary>level4to0Generator</summary><pre>', h($level4to0Generator->generate($level4to0)), PHP_EOL, '</pre></details>';

	$level4to5Generator = new Level4\Generator('Level5');
	if(GENERATE_OUT) echo '<details><summary>level4to5Generator</summary><pre>', h($level4to5Generator->generate($level4to5)), PHP_EOL, '</pre></details>';

	require_once './level4/plotter.php';
	$level4Plotter = new Level4\Plotter();
	if(GENERATE_PLOT) echo $level4Plotter->svg($level4);


	require_once './level5/generator.php';
	require_once './level5/schema.php';
	$level5 = require_once './level5/self.php';
	$level5to6 = require_once './level5/level6.php';
	$level5to4 = require_once './level5/level4.php';

	$level5Generator = new Level5\Generator();
	if(GENERATE_OUT) echo '<details><summary>level5Generator</summary><pre>', h($level5Generator->generate($level5)), PHP_EOL, '</pre></details>';

	$level5to6Generator = new Level5\Generator('Level6');
	if(GENERATE_OUT) echo '<details><summary>level5to6Generator</summary><pre>', h($level5to6Generator->generate($level5to6)), PHP_EOL, '</pre></details>';

	$level5to4Generator = new Level5\Generator('Level4');
	if(GENERATE_OUT)  echo '<details><summary>level5to4Generator</summary><pre>', h($level5to4Generator->generate($level5to4)), PHP_EOL, '</pre></details>';


	require_once './level5/plotter.php';
	$level5Plotter = new Level5\Plotter();
	if(GENERATE_PLOT) echo $level5Plotter->svg($level5);

	require_once './level6/generator.php';
	require_once './level6/schema.php';
	$level6 = require_once './level6/self.php';
	$level6to7 = require_once './level6/level7.php';
	$level6to5 = require_once './level6/level5.php';

	$level6Generator = new Level6\Generator();
	if(GENERATE_OUT) echo '<details><summary>level6Generator</summary><pre>', h($level6Generator->generate($level6)), PHP_EOL, '</pre></details>';

	$level6to7Generator = new Level6\Generator('Level7');
	if(GENERATE_OUT) echo '<details><summary>level6to7Generator</summary><pre>', h($level6to7Generator->generate($level6to7)), PHP_EOL, '</pre></details>';

	$level6to5Generator = new Level6\Generator('Level5');
	if(GENERATE_OUT) echo '<details><summary>level6to5Generator</summary><pre>', h($level6to5Generator->generate($level6to5)), PHP_EOL, '</pre></details>';


	require_once './level6/plotter.php';
	$level6Plotter = new Level6\Plotter();
	if(GENERATE_PLOT) echo $level6Plotter->svg($level6);

	require_once './level7/generator.php';
	require_once './level7/schema.php';
	$level7 = require_once './level7/self.php';
	$level7to8 = require_once './level7/level8.php';
	$level7to6 = require_once './level7/level6.php';

	$level7Generator = new Level7\Generator();
	if(GENERATE_OUT) echo '<details><summary>level7Generator</summary><pre>', h($level7Generator->generate($level7)), PHP_EOL, '</pre></details>';

	$level7to8Generator = new Level7\Generator('Level8');
	if(GENERATE_OUT) echo '<details><summary>level7to8Generator</summary><pre>', h($level7to8Generator->generate($level7to8)), PHP_EOL, '</pre></details>';

	$level7to6Generator = new Level7\Generator('Level6');
	if(GENERATE_OUT) echo '<details><summary>level7to6Generator</summary><pre>', h($level7to6Generator->generate($level7to6)), PHP_EOL, '</pre></details>';

	require_once './level7/plotter.php';
	$level7Plotter = new Level7\Plotter();
	if(GENERATE_PLOT) echo $level7Plotter->svg($level7);

	require_once './level8/generator.php';
	require_once './level8/schema.php';
	$level8 = require_once './level8/self.php';
	$level8to9 = require_once './level8/level9.php';
	$level8to7 = require_once './level8/level7.php';

	$level8Generator = new Level8\Generator();
	if(GENERATE_OUT) echo '<details><summary>level8Generator</summary><pre>', h($level8Generator->generate($level8)), PHP_EOL, '</pre></details>';


	$level8to9Generator = new Level8\Generator('Level9');
	if(GENERATE_OUT) echo '<details><summary>level8to9Generator</summary><pre>', h($level8to9Generator->generate($level8to9)), PHP_EOL, '</pre></details>';

	$level8to7Generator = new Level8\Generator('Level7');
	if(GENERATE_OUT) echo '<details><summary>level8to7Generator</summary><pre>', h($level8to7Generator->generate($level8to7)), PHP_EOL, '</pre></details>';

	require_once './level9/generator.php';
	require_once './level9/schema.php';
	$level9 = require_once './level9/self.php';

	$level9Generator = new Level9\Generator();
	if(GENERATE_OUT) echo '<details><summary>level9Generator</summary><pre>', h($level9Generator->generate($level9)), PHP_EOL, '</pre></details>';
	?>
</body>
</html>