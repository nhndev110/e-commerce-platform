import { editorConfig, ClassicEditor } from "../../ckeditor.config.js";

const productCreateForm = $('#form-create-product');
const productAttributeList = $("#product-attribute-list");
const btnAddAttribute = $('#btn-add-attribute');
const productAttributeTemplate = $('#product-attribute-template');
let productAttributeCount = 0;
let productImagesCount = 0;

let productDescriptionEditor;
let productImages;
let productImagesArr = [];

Dropzone.autoDiscover = false;

$(function () {
  ClassicEditor.create(
    document.querySelector("textarea[name='productDescription']"),
    editorConfig
  )
    .then((editor) => {
      productDescriptionEditor = editor;
    })
    .catch((error) => {
      console.error(error);
    });


  const previewNode = document.querySelector("#template");
  previewNode.id = "";
  const previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  productImages = new Dropzone("#productImages", {
    url: "xxx.com",
    method: "post",
    uploadMultiple: true,
    files: true,
    paramName: "productImages",
    acceptedFiles: ".jpg,.png,.jpeg,.webp,.svg",
    previewTemplate: previewTemplate,
    maxFilesize: 2,
    autoQueue: false,
    previewsContainer: "#previews",
    clickable: ".fileinput-button",
  });

  productImages.on('addedfile', function (file) {
    const previewTemplate = file.previewTemplate;

    const controlLabel = previewTemplate.querySelector('.custom-control-label');
    const controlInput = previewTemplate.querySelector('.custom-control-input');

    controlLabel.setAttribute('for', `setImageHidden-${productImagesCount}`);
    controlInput.id = `setImageHidden-${productImagesCount}`;
    controlInput.setAttribute('value', productImagesCount);

    const checkLabel = previewTemplate.querySelector('.form-check-label');
    const checkInput = previewTemplate.querySelector('.form-check-input');

    checkLabel.setAttribute('for', `setThumbnail-${productImagesCount}`);
    checkInput.id = `setThumbnail-${productImagesCount}`;
    checkInput.setAttribute('value', productImagesCount);

    productImagesArr.push(file);

    productImagesCount++;
  });

  productImages.on('removedfile', function () {
    productImagesArr = this.getAcceptedFiles();
  });

  $('#previews').sortable({
    animation: 150,
    handle: '.handle',
    onEnd: function (evt) {
      [productImagesArr[evt.oldIndex], productImagesArr[evt.newIndex]]
        = [productImagesArr[evt.newIndex], productImagesArr[evt.oldIndex]];
    }
  });

  $('#product-attribute-list').sortable({
    animation: 150,
    handle: '.handle',
    onEnd: function (evt) {
      console.log('Phần tử đã được di chuyển từ vị trí', evt.oldIndex, 'đến', evt.newIndex);
    }
  });

  $('.datetimepicker').datetimepicker({
    allowInputToggle: true,
    showClose: true,
    showClear: true,
    showTodayButton: true,
    format: "MM/DD/YYYY hh:mm:ss A",
  });

  $('.select2bs4').select2({
    theme: 'bootstrap4',
    width: '100%',
  }).on('select2:open', function (ev) {
    $(`[aria-controls='select2-${ev.target.id}-results']`)[0].focus();
  });

  initProductAttribute();
  handleChangeVisibility();
  handleValidateProductCreateForm();
  handleProductCreateForm();
});

function getProductAttributesValue() {
  const result = [];
  $.each($('.product-attribute'), function (idx, el) {
    el = $(el);
    result.push({
      option: el.find('[name=productAttributeOption]').val(),
      value: el.find('[name=productAttributeValue]').val(),
      stock: +el.find('[name=productAttributeStock]').val()
    });
  });
  return result;
}

function initProductAttribute() {
  productAttributeTemplate.remove();
  handleAppendProductAttribute();
  btnAddAttribute.click(handleAppendProductAttribute);
}

function handleAppendProductAttribute() {
  const productAttribute = productAttributeTemplate.clone();
  productAttribute.attr('id', `product-attribute-${productAttributeCount++}`);
  productAttributeList.append(productAttribute);
  productAttribute.find('.delete-attribute').click(handleRemoveProductAttribute);
  productAttribute.fadeIn(350);
}

function handleRemoveProductAttribute() {
  $(this).closest(".product-attribute").fadeOut(350, function () {
    $(this).remove();
  });
}

function handleChangeVisibility() {
  $("[name='productVisibility']").change(function (ev) {
    if ($(this).val() == 0) {
      $(".scheduled-input").fadeIn(350);
    } else {
      $(".scheduled-input").fadeOut(350);
    }
  });
}

function handleValidateProductCreateForm() {
  productCreateForm.validate({
    ignore: ".select2-search__field, .ck-content, .ck-widget",
    debug: true,
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.addClass("invalid-feedback");
      element.closest(".form-group").append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
    rules: {
      productName: { required: true, minlength: 5, maxlength: 255 },
      productPrice: { required: true },
      productDiscount: { required: true, min: 0, max: 100 },
    },
    messages: {
      productName: {
        required: "Please enter the product name.",
        minlength: $.validator.format("Please enter at least {0} characters."),
        maxlength: $.validator.format("Please enter no more than {0} characters."),
      },
      productPrice: {
        required: "Please enter the product price.",
      },
      productDiscount: {
        required: "Please enter the product discount.",
        min: "Discount cannot be less than 0%.",
        max: "Discount cannot exceed 100%.",
      },
    }
  });
}

function handleProductCreateForm() {
  productCreateForm.submit(function (ev) {
    ev.preventDefault();

    $('.invalid-feedback').remove();
    $('.is-invalid').removeClass('is-invalid');

    if (!productCreateForm.valid()) {
      return;
    }

    const productName = $('[name=productName]').val();
    const productSlug = $('[name=productSlug]').val();
    const productPrice = $('[name=productPrice]').val();
    const productDiscount = $('[name=productDiscount]').val();
    const productDescription = $('[name=productDescription]').val();
    const productThumbnail = $('[name=setThumbnail]').map((idx, el) => {
      if ($(el).is(':checked')) {
        return idx;
      }
    }).get()[0] ?? "";
    const category = $('[name=category]').val();
    const supplier = $('[name=supplier]').val();
    const brand = $('[name=brand]').val();
    const setImageHidden = $('[name=setImageHidden]')
      .map((idx, el) => +el.checked)
      .toArray();
    const productVisibility = $('[name=productVisibility]').filter((idx, el) => el.checked).val();
    const productAttributesValue = getProductAttributesValue();

    const formData = new FormData();
    formData.append('productName', productName);
    formData.append('productSlug', productSlug);
    formData.append('productPrice', productPrice);
    formData.append('productDiscount', productDiscount);
    formData.append('productDescription', productDescription);
    formData.append('productThumbnail', productThumbnail);
    formData.append('setImageHidden', setImageHidden);
    formData.append('category', category);
    formData.append('supplier', supplier);
    formData.append('brand', brand);
    formData.append('productVisibility', productVisibility);
    productImagesArr.forEach(image => formData.append('productImages[]', image));
    productAttributesValue.forEach(
      productAttribute => formData.append('productAttributes[]', JSON.stringify(productAttribute))
    );

    $.ajax({
      type: "POST",
      url: "/admin/products",
      headers: { 'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content') },
      data: formData,
      dataType: "json",
      cache: false,
      contentType: false,
      processData: false,
    })
      .done(function (resp, textStatus, jqXHR) {
        if (jqXHR.status === 201) {
          Swal.fire({
            title: "Product Added Successfully!",
            text: "Would you like to add another product or go back to product management?",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: "Back to Product Management",
            confirmButtonColor: "#d33",
            cancelButtonText: "Add Another Product",
            cancelButtonColor: "#3085d6",
          }).then((result) => {
            if (result.isConfirmed) {
              location.href = "/admin/products";
            }
          });
        }
      })
      .fail(function (resp, textStatus, jqXHR) {
        if (resp.status === 422) {
          const errors = resp.responseJSON.error;

          $.each(errors, function (field, error) {
            const inputField = $(`[name='${field}']`);
            inputField.addClass('is-invalid');
            inputField.after(`<div class="invalid-feedback d-block">${error}</div>`);
          });

          $('html, body').animate({ scrollTop: 0 }, 'fast');
        }
      });
  });
}