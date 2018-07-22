<?php

namespace slavkovrn\googlechart;

use yii\base\Widget;

class GoogleChartWidget extends Widget
{

	public $id = 'chart_div';
	public $title = 'Google Chart';
	public $style = '';
	public $data = [];

	public function init()
	{

		parent::init();

	}

	public function run()
	{

		parent::run();

		$this->registryScript();

		return $this->render('googlechart', [
			'id' => $this->id,
			'style' => $this->style,
		]);
	}

	protected function registryScript()
	{
		$this->getView()->registerJsFile('https://www.gstatic.com/charts/loader.js');

		$jsonData = $this->getData();
		$script = <<<JS
        	function drawChart() {
        		var data = new google.visualization.DataTable({$jsonData});
        
        		var options = {
        			title: '{$this->title}'
        		};
        
        		var chart = new google.visualization.AreaChart(document.getElementById('{$this->id}'));
        
        		chart.draw(data, options);
        	}
        
        	google.charts.load('current', {'packages': ['corechart']});
        	google.charts.setOnLoadCallback(drawChart);
JS;

		$this->getView()->registerJs($script, \yii\web\View::POS_END);

	}
	protected function getData(){
		$data = [
			'cols' => [
				[
					'id' => '',
					'label' => '',
					'pattern' => '',
					'type' => 'string',
				],
			],
			'rows' => []
		];
		$axisX = [];
		foreach ($this->data as $key => $value){
			$data['cols'][] = [
				'id' => '',
				'label' => $key,
				'pattern' => '',
				'type' => 'number',
			];
			foreach ($value as $subkey => $subvalue){
				if (!in_array($subkey,$axisX)){
					$axisX[] = $subkey;
				}
			}
		}
		foreach ($axisX as $item){
			$data['rows'][$item] = [
				'c' => [
					0 => [
						'v' => $item,
						'f' => null
					]
				]
			];
		}
		foreach ($this->data as $key => $value){
			foreach ($value as $subkey => $subvalue){
				$data['rows'][$subkey]['c'][] = [
					'v' => $subvalue,
					'f' => null
				];
			}
		}
		$rows = [];
		foreach ($data['rows'] as $row){
			$rows[] = $row;
		}
		$data['rows'] = $rows;

		return json_encode($data);
	}

}