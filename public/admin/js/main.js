$(function () {
  // $('.daterange-picker').daterangepicker({
  //   autoUpdateInput: false,
  //   locale: {
  //     cancelLabel: 'Clear',
  //     format: 'DD/MM/YYYY',
  //   }
  // });

  // $('.daterange-picker').on('apply.daterangepicker', function (ev, picker) {
  //   $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  // });

  // $('.daterange-picker').on('cancel.daterangepicker', function (ev, picker) {
  //   $(this).val('');
  // });

  // $('.datetime-picker').datetimepicker({
  //   locale: 'vi',
  //   format: 'L',
  //   icons: {
  //     time: 'fas fa-clock',
  //     date: 'fas fa-calendar-alt',
  //     up: 'fas fa-chevron-up',
  //     down: 'fas fa-chevron-down',
  //     previous: 'fas fa-chevron-left',
  //     next: 'fas fa-chevron-right',
  //     today: 'fas fa-crosshairs',
  //     clear: 'fas fa-trash-alt',
  //     close: 'fas fa-times'
  //   }
  // });

  bsCustomFileInput.init();

  $('.select2').select2({ width: "100%", theme: "bootstrap4", language: "vi" })
    .on("select2:open", function (ev) {
      $(`[aria-controls="select2-${ev.target.id}-results"]`)[0].focus();
    });

  $('.select2-tags').select2({
    language: "vi",
    width: "100%",
    theme: "bootstrap4",
    tags: true,
    multiple: true,
    tokenSeparators: [",", " "],
  });

  $('[data-toggle="tooltip"]').tooltip();
  $('.tooltip-price').on('keyup focus hover', function (ev) {
    $(this).attr('title', $(this).val() || 0).tooltip('dispose');
    $(this).tooltip('show');
  });

  $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': '__/__/____' });
  $('.number-separator').inputmask({
    alias: "numeric",
    groupSeparator: ",",       // Dấu phẩy phân cách phần nghìn
    autoGroup: true,           // Tự động thêm dấu phân cách
    digits: 0,                 // Không có chữ số thập phân
    removeMaskOnSubmit: true   // Loại bỏ ký tự phân cách phần nghìn khi submit form
  });
  $('[data-mask]').inputmask();
});
