<?php
/**
* @ngdoc overview
* @name opencart-desconto
* @author Luiz Fernando Ventura Sene Gonçalves <nandosenne@gmail.com>
* @version 1.0.0
* @description
* Módulo de desconto poor quantidade de iten no carrinho
*/
class ControllerTotalDescontoqnt extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('total/descontoqnt');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('descontoqnt', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->response->redirect($this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_methods'] = $this->language->get('entry_methods');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_edit'] = $this->language->get('heading_title');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_titulo'] = $this->language->get('entry_titulo');
		$data['entry_customer_group_display'] = $this->language->get('entry_tipo');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['tab_general'] = $this->language->get('tab_general');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_total'),
			'separator' => ' :: '
		);

		$data['breadcrumbs'][] = array(
			'href'      => $this->url->link('total/descontoqnt', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);

		$data['action'] = $this->url->link('total/descontoqnt', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('extension/total', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['descontoqnt_status'])) {
			$data['descontoqnt_status'] = $this->request->post['descontoqnt_status'];
		} else {
			$data['descontoqnt_status'] = $this->config->get('descontoqnt_status');
		}

		if (isset($this->request->post['descontoqnt_sort_order'])) {
			$data['descontoqnt_sort_order'] = $this->request->post['descontoqnt_sort_order'];
		} else {
			$data['descontoqnt_sort_order'] = $this->config->get('descontoqnt_sort_order');
		}

		if (isset($this->request->post['descontoqnt_total'])) {
			$data['descontoqnt_total'] = $this->request->post['descontoqnt_total'];
		} else {
			$data['descontoqnt_total'] = $this->config->get('descontoqnt_total');
		}

		if (isset($this->request->post['descontoqnt_quantidade'])) {
			$data['descontoqnt_quantidade'] = $this->request->post['descontoqnt_quantidade'];
		} else {
			$data['descontoqnt_quantidade'] = $this->config->get('descontoqnt_quantidade');
		}

		if (isset($this->request->post['descontoqnt_titulo'])) {
			$data['descontoqnt_titulo'] = $this->request->post['descontoqnt_titulo'];
		} else {
			$data['descontoqnt_titulo'] = $this->config->get('descontoqnt_titulo');
		}

		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		if (isset($this->request->post['descontoqnt_tipo'])) {
			$data['descontoqnt_tipo'] = $this->request->post['descontoqnt_tipo'];
		} elseif ($this->config->get('descontoqnt_tipo')) {
			$data['descontoqnt_tipo'] = $this->config->get('descontoqnt_tipo');
		} else {
			$data['descontoqnt_tipo'] = array();
		}

		if (isset($this->error['customer_group_display'])) {
			$data['error_customer_group_display'] = $this->error['customer_group_display'];
		} else {
			$data['error_customer_group_display'] = '';
		}


		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('total/descontoqnt.tpl', $data));

	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'total/descontoqnt')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
