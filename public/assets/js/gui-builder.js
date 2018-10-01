$(document).ready(function () {
    $('#open-component-sidebar').click(function () {
        $('.component-sidebar').toggleClass('active');
    });

    $('#open-property-sidebar').click(function () {
        $('.property-sidebar').toggleClass('active');
    });

    var $drawingArea = $('.drawing-area');
    var dropAreaPosition = $drawingArea.offset();
    var dropAreaWidth = $drawingArea.width();
    var dropAreaHeight = $drawingArea.height();

    var dropArea = {
        top: dropAreaPosition.top,
        right: dropAreaPosition.left + dropAreaWidth,
        bottom: dropAreaPosition.top + dropAreaHeight,
        left: dropAreaPosition.left
    };

    $( '.component-sidebar .sidebar-item' ).draggable({
        opacity: 0.7,
        cursor: 'move',
        helper: 'clone',
        containment: 'body',
        appendTo: 'body',
        start: function(event, ui) {
            $('.dropped-component').html($('#template-'+$(ui.helper).data('type')).html());
        },
        drag: function (event, ui) {
            console.log('dragging');
            if(checkCloneOver(ui.helper, dropArea)) {
                $('.dropped-component').removeClass('hide').addClass('preview');
            } else {
                $('.dropped-component').removeClass('preview').addClass('hide');
            }
        },
        stop: function (event, ui) {
            if(checkCloneOver(ui.helper, dropArea)) {
                console.log('tampil');
                $('.dropped-component')
                    .addClass('place')
                    .removeClass('preview')
                    .removeClass('dropped-component');

                $('.drawing-area').append($('#template-dropped').html());
            }
        }
    });

    function checkCloneOver(clone, dropArea) {
        var clonePos = clone.offset();
        var cloneProp = {
            top: clonePos.top,
            right: clonePos.left + clone.width(),
            bottom: clonePos.top + clone.height(),
            left: clonePos.left
        };

        var topLeft = false;
        if(cloneProp.top > dropArea.top &&
            cloneProp.left > dropArea.left &&
            cloneProp.top < dropArea.bottom &&
            cloneProp.left < dropArea.right
        ) {
            topLeft = true;
        }

        var topRight = false;
        if(cloneProp.top > dropArea.top &&
            cloneProp.right < dropArea.right &&
            cloneProp.top < dropArea.bottom &&
            cloneProp.right > dropArea.left
        ) {
            topRight = true;
        }

        var bottomLeft = false;
        if(cloneProp.bottom < dropArea.bottom &&
            cloneProp.left > dropArea.left &&
            cloneProp.bottom > dropArea.top &&
            cloneProp.left < dropArea.right
        ) {
            bottomLeft = true;
        }

        var bottomRight = false;
        if(cloneProp.bottom < dropArea.bottom &&
            cloneProp.right < dropArea.right &&
            cloneProp.bottom > dropArea.top &&
            cloneProp.right > dropArea.left
        ) {
            bottomLeft = true;
        }

        return topLeft || topRight || bottomLeft || bottomRight;
    }
});
