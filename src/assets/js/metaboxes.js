jQuery(function ($) {
  let frame;
  let imgPosition = 0;
  const btnUploadImage = $(".btn-upload-img");
  const selectedImg = $(".selected-images");
  const valueInput = $(".selected-images-id").val();
  let imgObj = {};
  let imgObjValue = {};
  const imgValue = $(".selected-images-id");

  imgObjValue = valueInput ? JSON.parse(valueInput) : {};

  btnUploadImage.on("click", function (event) {
    event.preventDefault();

    if (frame) {
      frame.open();
      return;
    }

    frame = wp.media({
      title: "Selecione a imagem",
      button: {
        text: "Selecionar",
      },
      multiple: true,
    });

    frame.on("select", function () {
      const attachment = frame.state().get("selection").first().toJSON();
      imgPosition = Object.keys(imgObjValue).length + 1;
      imgObj.id = attachment.id;
      imgObj.alt = attachment.name;
      imgObj.url = attachment.url;

      imgObjValue[`position-${imgPosition}`] = imgObj;

      const imgObjValueString = JSON.stringify(imgObjValue);
      imgValue.val(imgObjValueString);
      imgObj = {};

      selectedImg.html("");
      for (const [key, value] of Object.entries(imgObjValue)) {
        selectedImg.append(
          `<div class="image-selected" data-position="${key}"><a class="btn-remove-image"></a><img src="${value.url}" alt="${value.name}"></div>`
        );
      }
    });

    frame.open();
  });

  selectedImg.on("click", ".btn-remove-image", function (e) {
    e.preventDefault();

    const imageContainer = $(this).closest(".image-selected");
    const position = imageContainer.data("position");

    delete imgObjValue[position];

    const updatedImgObjValue = {};
    let newPosition = 1;

    for (const key in imgObjValue) {
      if (imgObjValue.hasOwnProperty(key)) {
        updatedImgObjValue[`position-${newPosition}`] = imgObjValue[key];
        newPosition++;
      }
    }

    imgObjValue = updatedImgObjValue;

    if (Object.keys(imgObjValue).length === 0) {
      imgObjValue = {};
    }

    const imgObjValueString = JSON.stringify(imgObjValue);
    imgValue.val(imgObjValueString);

    imageContainer.remove();

    selectedImg.html("");
    for (const [key, value] of Object.entries(imgObjValue)) {
      selectedImg.append(
        `<div class="image-selected" data-position="${key}"><a class="btn-remove-image"></a><img src="${value.url}" alt="${value.name}"></div>`
      );
    }
  });
});

/* melhorias, ao inves de manipular o json, arrumar uma forma de atualizar ele, usar uma função capaz de fazer a leitura 
dos arquivos existentes e assim gerar o json, dessa forma vou cortar a opção de remove e atualizar o json*/
