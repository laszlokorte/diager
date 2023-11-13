<?php

namespace Level3;

class Generator {
	public function __construct(public $namespace = __NAMESPACE__) {

	}

	public function generate(Diagram $diagram) {
		$attributes = implode(', ', [
			'public string $id',
			...array_map(fn($ent) => <<<EO
			public \$listOf$ent->id = []
			EO, $diagram->listOfEntity),
			...array_map(fn($rel) => <<<EO
			public \$listOf$rel->id = []
			EO, $diagram->listOfRelation)
		]);

		$entities = implode(PHP_EOL, array_map(fn($ent) => <<<EO
			class $ent->id {
				function __construct(public string \$id) {
				}
			}
			EO, $diagram->listOfEntity));

		$relations = implode(PHP_EOL, array_map(fn($ent) => <<<EO
			class $ent->id {
				function __construct(public \$left, public \$right) {
				}
			}
			EO, $diagram->listOfRelation));

		return <<<EO
			<?php

			namespace $this->namespace;

			class $diagram->id {
				function __construct($attributes) {

				}
			}

			$entities

			$relations
			EO;
	}
}