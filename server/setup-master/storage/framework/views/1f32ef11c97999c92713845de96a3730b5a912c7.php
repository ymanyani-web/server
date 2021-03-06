<div
    class="filter-scope date form-group"
    data-control="datepicker"
    data-opens="<?php echo e(array_get($scope->config, 'pickerPosition', 'left')); ?>"
    data-time-picker="<?php echo e(array_get($scope->config, 'showTimePicker', 'false')); ?>"
    data-locale='{"format": "<?php echo e($pickerFormat = array_get($scope->config, 'pickerFormat', 'MMM D, YYYY')); ?>"}'
>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-icon"><i class="fa fa-calendar"></i></span>
        </div>
        <input
            type="text"
            id="<?php echo e($this->getScopeName($scope)); ?>-datepicker"
            class="form-control"
            value="<?php echo e($scope->value ? make_carbon($scope->value)->isoFormat($pickerFormat) : ''); ?>"
            placeholder="<?php echo app('translator')->get($scope->label); ?>"
            data-datepicker-trigger
            autocomplete="off"
            <?php echo $scope->disabled ? 'disabled="disabled"' : ''; ?>

        >
        <input
            data-datepicker-input
            type="hidden"
            name="<?php echo e($this->getScopeName($scope)); ?>"
            value="<?php echo e($scope->value); ?>"
        />
    </div>
</div>
<?php /**PATH /Users/ymanyani/server/setup-master/app/admin/widgets/filter/scope_date.blade.php ENDPATH**/ ?>