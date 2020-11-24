/**Select 2 */
$('.select2').select2({
  theme: 'bootstrap4',
  width: $('.select2').data('width') ? $('.select2').data('width') : $('.select2').hasClass('w-100') ? '100%' : 'style',
  placeholder: $('.select2').data('placeholder'),
  allowClear: Boolean($('.select2').data('allow-clear')),
  selectOnClose: true,
});