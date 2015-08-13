<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Role Management</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px" ng-if="displayField(['role_admin'])">
            <form class="form-horizontal" action="<?= base_url() ?>user-management/role/mapModulePermission" method="post">
                <input type="hidden" name="<?= mRole::ID ?>" value="<?= $roleDetail[mRole::ID] ?>" />
                <div class="col-md-12 row" style="padding: 7px">
                    <?php
                    $i = 0;
                    foreach ($menuBlock as $menu):
                        ?>
                        <div class="col-md-3" style="padding: 5px">
                            <div class="col-md-12 btn btn-lg btn-info">
                                <?= $menu[mModule::NAME] ?>
                            </div>
                            <br />
                            <div class="clearfix"></div>
                            <?php foreach ($moduleBlock[$menu[mModule::ID]] as $module): ?>
                                <div class="col-md-12" style="height: 25px"></div>
                                <div class="clearfix"></div>
                                <div class="col-md-10 col-md-offset-1" style="border: solid 2px black; padding: 4px; border-radius: 4px">
                                    <h4><b><?= $module[mModule::NAME] ?></b></h4>
                                </div>
                                <?php foreach ($roleBlock[$module[mModule::ID]] as $role): ?>
                                    <div class="col-md-10 col-md-offset-1 checkbox">
                                        <label class="control-label">
                                            <input type="checkbox" value="<?= $role[mModule::ID] ?>" name="role[]" <?= $roleEnabled[$role[mModule::ID]]?>/>
                                            <?= $role[mModule::NAME] ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php if ($i % 4 == 0) { ?>
                                <div class="clearfix"></div>
                            <?php } ?>
                        </div>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                    <div class="clearfix"></div>
                    <!--
                    <div class="form-group">
                        <form class="form-horizontal" action="<?= base_url() ?>user-management/role/mapModulePermission" method="post">
                            <input type="hidden" name="<?= mRole::ID ?>" value="<?= $roleDetail[mRole::ID] ?>" />
                            <div class="col-md-4">
                                <h4>Role</h4>
                            </div>
                            <div class="col-md-4">
                                <h4><?= $roleDetail[mRole::NAME] ?></h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4">
                                <h4>Modules</h4>
                            </div>
                            <div class="col-md-6">
        
                    <?php
                    foreach ($moduleList as $module) {
                        ?>
                                                                                                                <div class="col-md-2 control-label pull-left">
                        <?= ucwords(strtolower($module[mModule::NAME])) ?>
                                                                                                                </div>
                                                                                                                <div class="col-md-2 checkbox">
                                                                                                                    <label class="control-label">
                                                                                                                        <input type="checkbox" value="<?= $module[mModule::ID] ?>" name="view[]" <?= $roleViews[$module[mModule::ID]] ?> />
                                                                                                                        View
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                                <div class="col-md-2 checkbox">
                                                                                                                    <label class="control-label">
                                                                                                                        <input type="checkbox" value="<?= $module[mModule::ID] ?>" name="edit[]" <?= $roleEdits[$module[mModule::ID]] ?> />
                                                                                                                        Edit
                                                                                                                    </label>
                                                                                                                </div>
                                                                                                                <div class="clearfix"></div>
                        <?php
                    }
                    ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 offset3">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                    -->
                    <div style="height: 25px; width: 100%"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 offset3">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
