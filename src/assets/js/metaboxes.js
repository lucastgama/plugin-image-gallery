jQuery(function ($) {
  var frame;
  let imgPosition = 0;
  let btnUploadImage = $(".btn-upload-custom-img");
  let selectedImg = $(".selected-images");
  let imgObj = {};
  let imgObjValue = {};

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
      let attachment = frame.state().get("selection").first().toJSON();
      selectedImg.append(
        '<div class="image-selected"> <a class="btn-remove-image" href=""></a><img src="' +
          attachment.url +
          '" alt="' +
          attachment.name +
          '"></div>'
      );
      imgPosition++;
      imgObj.id = attachment.id;
      imgObj.alt = attachment.name;
      imgObj.url = attachment.url;

      imgObjValue[`position-${imgPosition}`] = imgObj;

      for (const key in imgObjValue) {
        if (imgObjValue.hasOwnProperty(key)) {
          const value = imgObjValue[key];
          console.log(key, value);
        }
      }

      imgObj = {};
      console.log(imgObjValue);
    });

    frame.open();
  });
});
