<?php
/**
* @ngdoc overview
* @name opencart-desconto
* @author Luiz Fernando Ventura Sene Gonçalves <nandosenne@gmail.com>
* @version 1.0.0
* @description
* Módulo de desconto poor quantidade de iten no carrinho
*/
class ModelTotalDescontoqnt extends Model {
	public function getTotal(&$total_data, &$total, &$taxes) {
		if ($this->cart->hasShipping() && $this->config->get('descontoqnt_status')) {
			$methods_aplicaveis = explode(",", $this->config->get('descontoqnt_methods'));

			if(isset($this->session->data['payment_method']['code']))
			$paymethod = $this->session->data['payment_method']['code'];
			$quantidade=$this->config->get('descontoqnt_quantidade');
			$tipo=$this->config->get('descontoqnt_tipo');
			$produtos = $this->cart->getProducts();
			$qnt = 0;							  	foreach ($produtos as $prod) {
				$qnt += $prod['quantity'];
			}
			if(in_array($this->customer->getGroupId(), $tipo)) {
				if($qnt >= $quantidade) {
					$this->load->language('total/descontoqnt');
					$percent = $this->config->get('descontoqnt_total') / 100;
					$percent = $total * $percent;
					$total_data[] = array(
						'code'		 => 'descontoqnt',
						'title'      => $this->config->get('descontoqnt_titulo').' '. $this->config->get('descontoqnt_total'). '%',
						'text'       => '<span class="discont">- ' . $this->currency->format($percent) . '</span>',
						'value'      => $percent*-1,
						'sort_order' => $this->config->get('descontoqnt_sort_order')
					);
					$total -= $percent;
				}		  }
			}
		}
	}
	?>
