

<div class="row wrapper border-bottom white-bg">

<div class="col-lg-4 navbar-right">
    <a class="minimalize-styl-2 btn btn-primary " href="<?php echo base_url('task') ?>"><i class="fa fa-angle-double-up"></i> Manage Task</a>
</div>


</div>


<!-- Main content -->
<div class="wrapper wrapper-content  animated fadeInDown">


    <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php elseif($this->session->flashdata('error')): ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All Tasks</h5>

                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <input type="text" class="form-control form-control-sm m-b-xs" id="filter"
                               placeholder="Search in table">

                        <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                        <thead>
                        <tr>

                            <th data-toggle="true">Task</th>
                            <th data-hide="phone">Time</th>
                            <th data-hide="all">Ingredients</th>
                            <th data-hide="phone">Price</th>
                            <th data-hide="phone,tablet" >Production</th>
                            <th data-hide="phone">Status</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php if($task_data): ?>
                        <?php foreach ($task_data as $k => $v): ?>
                        <tr>
                            <td>
                                <?php echo $v['task_info']['description']; ?>
                            </td>
                            <td>
                                <?php if($v['task_info']['status']=='todo'){?>
                                        <p>Reserved</p>
                                <?php
                                } else if($v['task_info']['status']=='progress'){?>
                                    <p><?php echo $v['task_info']['date_time_issued']; ?></p>

                                <?php

                                }else{?>
                                    <p><?php echo $v['task_info']['date_time_completed']; ?></p>
                                <?php } ?>

                            </td>
                            <td>
                                <?php if($v['task_info']['ingredients']):?>
                                <?php foreach (json_decode($v['task_info']['ingredients'], true) as $ki => $vi): ?>
                                    <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                <?php endforeach ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                $50.00
                            </td>
                            <td>
                                <?php if($v['task_info']['production']):?>
                                    <?php foreach (json_decode($v['task_info']['production'], true) as $ki => $vi): ?>
                                        <p><?php echo $ki; ?>:</strong><?php echo $vi; ?></p>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </
                            </td>
                            <td>
                                <?php if($v['task_info']['status']=='todo') {
                                    $color = 'label label-success';
                                }else if($v['task_info']['status']=='progress'){
                                    $color ='label label-warning';

                                }else{
                                    $color ='label label-primary';

                                }

                                ?>
                                <span class="<?php echo $color; ?>"><?php echo $v['task_info']['status']; ?></span>

                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <button class="btn-white btn btn-xs">View</button>
                                    <button class="btn-white btn btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                            <?php endforeach ?>
                        <?php endif; ?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6">
                                <ul class="pagination float-right"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>


                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    $(document).ready(function() {

        $('.footable').footable();
        $('.footable2').footable();

    });

</script>