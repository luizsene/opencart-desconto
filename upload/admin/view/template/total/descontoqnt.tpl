<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-coupon" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
        <h1><?php echo $heading_title; ?></h1>
        <ul class="breadcrumb">
          <?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <div class="container-fluid">
        <div class="container-fluid">
          <?php if ($error_warning) { ?>
            <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
              <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php } ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
              </div>
              <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-coupon" class="form-horizontal">
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                    <div class="col-sm-10">
                      <select name="descontoqnt_status" id="input-status" class="form-control">
                        <?php if ($descontoqnt_status) { ?>
                          <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                          <option value="0"><?php echo $text_disabled; ?></option>
                          <?php } else { ?>
                            <option value="1"><?php echo $text_enabled; ?></option>
                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label"><?php echo $entry_customer_group_display; ?></label>
                        <div class="col-sm-10">
                          <?php foreach ($customer_groups as $customer_group) { ?>
                            <div class="checkbox">
                              <label>
                                <?php
                                if (in_array($customer_group['customer_group_id'], $descontoqnt_tipo)) { ?>
                                  <input type="checkbox" name="descontoqnt_tipo[]" value="<?php echo $customer_group['customer_group_id']; ?>" checked="checked" />
                                  <?php echo $customer_group['name']; ?>
                                  <?php } else { ?>
                                    <input type="checkbox" name="descontoqnt_tipo[]" value="<?php echo $customer_group['customer_group_id']; ?>" />
                                    <?php echo $customer_group['name']; ?>
                                    <?php } ?>
                                  </label>
                                </div>
                                <?php } ?>
                                <?php if ($error_customer_group_display) { ?>
                                  <div class="text-danger"><?php echo $error_customer_group_display; ?></div>
                                  <?php } ?>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_methods; ?></label>
                                <div class="col-sm-10">
                                  <input type="text" name="descontoqnt_quantidade" value="<?php echo $descontoqnt_quantidade; ?>" placeholder="<?php echo $entry_methods; ?>" id="input-sort-order" class="form-control" />
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_total; ?></label>
                                <div class="col-sm-10">
                                  <input type="text" name="descontoqnt_total" value="<?php echo $descontoqnt_total; ?>" placeholder="<?php echo $entry_total; ?>" id="input-sort-order" class="form-control" />

                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_titulo; ?></label>
                                <div class="col-sm-10">
                                  <input type="text" name="descontoqnt_titulo" value="<?php echo $descontoqnt_titulo; ?>" placeholder="<?php echo $entry_titulo; ?>" id="input-titulo" class="form-control" />

                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-sort-order"><?php echo $entry_sort_order; ?></label>
                                <div class="col-sm-10">
                                  <input type="text" name="descontoqnt_sort_order" value="<?php echo $descontoqnt_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-sort-order" class="form-control" />
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php echo $footer; ?>
