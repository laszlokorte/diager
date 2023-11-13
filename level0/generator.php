<?php

namespace Level0;

class Generator {
	public function __construct(public $namespace = __NAMESPACE__) {

	}

	public function generate(Diagram $diagram) {
		return <<<EO
			<?php

			namespace $this->namespace;

			class $diagram->id {
				function __construct(public string \$id) {

				}
			}

			EO;
	}
}