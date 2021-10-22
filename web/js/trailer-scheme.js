$(document).ready(function() {
    $( "#save" ).click(function() {
        saveMarkupData();
    });

    function saveMarkupData() {
        var points = [];
        var imageBlock = $( "#trailer-image" ); //console.log(imageBlock);
        //console.log(imageBlock.offset());

        imageBlock.find( ".trailer-image-dot" ).each(function() {
            var point = {};

            point.number = $(this).data('number'); //console.log(point.number);

            point.point = {};

            point.point.left = $(this).offset().left - imageBlock.offset().left; //console.log(point.point.left);
            point.point.top = $(this).offset().top - imageBlock.offset().top; //console.log(point.point.top);
            
            if ($( ".trailer-image-bendingPoint._number" + point.number ).length > 0) {
                point.bendingPoint = {};
                point.bendingPoint.left = $( ".trailer-image-bendingPoint._number" + point.number ).eq(0).offset().left - imageBlock.offset().left;
                    //console.log(point.bendingPoint.left);
                point.bendingPoint.top = $( ".trailer-image-bendingPoint._number" + point.number ).eq(0).offset().top - imageBlock.offset().top;
                    //console.log(point.bendingPoint.top);

                var verticalBending = $( "#trailer-image-line_bending_vertical_number" + point.number );
                    //console.log(verticalBending.offset());
                var vertical = $( "#trailer-image-line_vertical_number" + point.number );//.not('._bending').eq(0);
                    //console.log(vertical.offset());
                var horizontalBending = $( "#trailer-image-line_bending_number" + point.number );//.not('._vertical').eq(0);
                    //console.log(horizontalBending.offset());
                var horizontal = $( "#trailer-image-line_number" + point.number );//.not('._vertical').not('._bending').eq(0);
                    //console.log(horizontal.offset());

                if (verticalBending.length > 0) {
                    point.verticalBending = {
                        top: verticalBending.offset().top - imageBlock.offset().top,
                        left: verticalBending.offset().left - imageBlock.offset().left,
                        height: verticalBending.height()
                    };
                }

                if (vertical.length > 0) {
                    point.vertical = {
                        top: vertical.offset().top - imageBlock.offset().top,
                        left: vertical.offset().left - imageBlock.offset().left,
                        height: vertical.height()
                    };
                }

                if (horizontalBending.length > 0) {
                    point.horizontalBending = {
                        top: horizontalBending.offset().top - imageBlock.offset().top,
                        left: horizontalBending.offset().left - imageBlock.offset().left,
                        width: horizontalBending.width()
                    };
                }

                if (horizontal.length > 0) {
                    point.horizontal = {
                        top: horizontal.offset().top - imageBlock.offset().top,
                        left: horizontal.offset().left - imageBlock.offset().left,
                        width: horizontal.width()
                    };
                }
            }

            points.push(point); //console.log(point.point);
        }); //console.log(points);

        $.ajax({
            url: '/admin/trailer/save-diagram',
            type: 'post',
            data: {
                id: $('input#trailer-id').val(),
                markup: points,
            },
            dataType: 'json',
            success: function() {
                alert("OK");
            },
        });
    }

    // Установка точки - выделение объекта, с чьей точкой работаем
    $('.trailer-content-item').on('click', function() { //console.log('here');
        $('.trailer-content-item').removeClass('_selected');
        $('.trailer-image-bendingPoint').removeClass('_selected');
        $(this).addClass('_selected');
    });

    $('.trailer-image').on('click', '.trailer-image-dot', function(event) {
        event.stopPropagation();

        var number = $(this).data('number');
        var element = $('.trailer-content-item-number._number' + number).parents('.trailer-content-item').eq(0);

        element.triggerHandler('click');
    }).on('dblclick', '.trailer-image-dot', function(event) {
        event.stopPropagation();

        var imageBlock = $(this).parents('.trailer-image');
        var number = $(this).data('number');

        if (imageBlock.find('.trailer-image-dot._number' + number).length > 0) { // Стираем всё сопутствующее и точку
            imageBlock.find('.trailer-image-dot._number' + number).remove();
            imageBlock.find('.trailer-image-bendingPoint._number' + number).remove();
            imageBlock.find('.trailer-image-line._number' + number).remove();
            imageBlock.find('.trailer-image-linePoint._number' + number).remove();   
        }

        //saveMarkupData();
    });

    // Клик по изображению
    $('.trailer-image').on('click', function(event) { //console.log(1);
        var imageBlock = $(this);

        // Если есть выделенный блок
        if ($('.trailer-content-item._withLines._selected').length > 0) { //console.log(2);
            //var element = $('.trailer-content-item._withLines._selected').eq(0);

            //var number = parseInt(element.find('.trailer-content-item-number').text(), 10);
            var number = $( ".trailer-content-item._withLines._selected" ).data( "number" ); //console.log(number);
            var element = $( "#trailer-content-item" + number );

            // Если точка есть
            if (imageBlock.find('.trailer-image-dot._number' + number).length > 0) { // Стираем всё сопутствующее и точку
                imageBlock.find('.trailer-image-dot._number' + number).remove();
                imageBlock.find('.trailer-image-bendingPoint._number' + number).remove();
                imageBlock.find('.trailer-image-line._number' + number).remove();
                imageBlock.find('.trailer-image-linePoint._number' + number).remove();   
            }

            // Определяем место клика
            var positionLeft = event.pageX - imageBlock.offset().left - 12;
            var positionTop = event.pageY - imageBlock.offset().top - 12;

            // Ставим точку
            var newDot = $('<div data-number="' + number + '" class="trailer-image-dot _number' + number + '" id="trailer-image-dot_number' + number + '">' + number + '</div>');
            newDot.css({left: positionLeft, top: positionTop});
            newDot.data('number', number);
            newDot.appendTo(imageBlock);

            // Определяем позицию точки клика
            var elementPointPositionLeft = element.find('.trailer-content-item-number').offset().left;
            var elementPointPositionTop = element.find('.trailer-content-item-number').offset().top;

            // Ставим две линии
            var newHorizontalLine = $('<div class="trailer-image-line _number' + number + '" id="trailer-image-line_number' + number + '"></div>');
            newHorizontalLine.appendTo(imageBlock);

            var newVerticalLine = $('<div class="trailer-image-line _vertical _number' + number + '" id="trailer-image-line_vertical_number' + number + '"></div>');
            newVerticalLine.appendTo(imageBlock);

            // Ставим две линии загиба и точку загиба
            var newBendingPoint = $('<div class="trailer-image-bendingPoint _number' + number + '" id="trailer-image-bendingPoint_number' + number + '"></div>');
            newBendingPoint.appendTo(imageBlock);
            newBendingPoint.data('number', number);
            var newHorizontalBendingLine = $('<div class="trailer-image-line _bending _number' + number + '" id="trailer-image-line_bending_number' + number + '"></div>');
            newHorizontalBendingLine.appendTo(imageBlock);
            var newVerticalBendingLine = $('<div class="trailer-image-line _bending _vertical _number' + number + '" id="trailer-image-line_bending_vertical_number' + number + '"></div>');
            newVerticalBendingLine.appendTo(imageBlock);

            // Если в правом блоке
            if (element.parents('.trailer-rigth-panel').length > 0) {
                if ((elementPointPositionTop - positionTop - imageBlock.offset().top) > 0) {
                    newVerticalLine.css({left: positionLeft + 11, top: positionTop + 24, height: Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) - 12});
                    newHorizontalLine.css({top: positionTop + 24 + (Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) - 12), left: positionLeft + 12, width: Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left - 12)});
                    newBendingPoint.css({top: positionTop + Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) + 7, left: positionLeft + 7});
                } else {
                    newVerticalLine.css({left: positionLeft + 11, top: positionTop + (elementPointPositionTop - positionTop - imageBlock.offset().top) + 12, height: Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) - 12});
                    newHorizontalLine.css({top: positionTop - Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) + 12, left: positionLeft + 12, width: Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left - 12)});
                    newBendingPoint.css({top: positionTop - Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) + 8, left: positionLeft + 7});
                }                
            } else {
                if ((elementPointPositionLeft - positionLeft - imageBlock.offset().left) > 0) {
                    newVerticalLine.css({left: positionLeft + Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left) + 11, top: positionTop + 12, height: Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) - 12});
                    newHorizontalLine.css({top: positionTop + 12, left: positionLeft + 12, width: Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left)});
                    newBendingPoint.css({top: positionTop + 8, left: positionLeft + 7 + Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left)});
                } else {
                    newVerticalLine.css({left: positionLeft + 11 - Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left), top: positionTop + 12, height: Math.abs(elementPointPositionTop - positionTop - imageBlock.offset().top) - 12});
                    newHorizontalLine.css({top: positionTop + 12, left: positionLeft - Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left) + 12, width: Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left) - 12});
                    newBendingPoint.css({top: positionTop + 8, left: positionLeft + 7 - Math.abs(elementPointPositionLeft - positionLeft - imageBlock.offset().left)});
                }  
            }
        } else if ($('.trailer-content-item._selected').length > 0) { //console.log(3);
            //var element = $('.trailer-content-item._selected').eq(0); console.log(element);
            //var number = parseInt(element.find('.trailer-content-item-number').text(), 10);
            var number = $( ".trailer-content-item._selected" ).data( "number" ); console.log(number);

            // Если точка есть
            if (imageBlock.find('.trailer-image-dot._number' + number).length > 0) { // Стираем всё сопутствующее и точку  
                imageBlock.find('.trailer-image-dot._number' + number).remove();
                imageBlock.find('.trailer-image-bendingPoint._number' + number).remove();
                imageBlock.find('.trailer-image-line._number' + number).remove();
                imageBlock.find('.trailer-image-linePoint._number' + number).remove();
                //console.log(imageBlock);
            }

            // Определяем место клика
            var positionLeft = event.pageX - imageBlock.offset().left - 12; //console.log(positionLeft);
            var positionTop = event.pageY - imageBlock.offset().top - 12; //console.log(positionTop);

            // Ставим точку
            var newDot = $('<div class="trailer-image-dot _number' + number + '" id="trailer-image-dot_number' + number + '">' + number + '</div>');
            newDot.css({left: positionLeft, top: positionTop});
            newDot.data('number', number);
            newDot.appendTo(imageBlock);
        } else if ($('.trailer-image-bendingPoint._selected').length > 0) { // Если есть выделенная точка сгиба
            //console.log(4);

            // Определяем место клика
            var positionLeft = event.pageX - imageBlock.offset().left - 5;
            var positionTop = event.pageY - imageBlock.offset().top - 5;

            var number = $('.trailer-image-bendingPoint._selected').eq(0).data('number');
            var element = $('.trailer-content-item-number._number' + number).parents('.trailer-content-item').eq(0);

            // Определяем позицию точки клика
            var elementPointPositionLeft = element.find('.trailer-content-item-number').offset().left;
            var elementPointPositionTop = element.find('.trailer-content-item-number').offset().top;

            $('.trailer-image-bendingPoint._selected').css({
                top: positionTop,
                left: positionLeft
            });

            var dot = $('.trailer-image-dot._number' + number).eq(0);

            // Определяем позицию точки клика
            var dotPositionLeft = dot.offset().left + 12;
            var dotPositionTop = dot.offset().top + 12;

            var horizontalLine = $('.trailer-image-line._number' + number).not('._bending').not('._vertical').eq(0);
            var verticalLine = $('.trailer-image-line._vertical._number' + number).not('._bending').eq(0);
            var horizontalBendingLine = $('.trailer-image-line._bending._number' + number).not('._vertical').eq(0);
            var verticalBendingLine = $('.trailer-image-line._bending._vertical._number' + number).eq(0);
            
            // Если в правом блоке
            if (element.parents('.trailer-rigth-panel').length > 0) {
                if (event.pageX - dotPositionLeft > 0) {
                    if (event.pageY - dotPositionTop > 0) {
                        if (event.pageY - elementPointPositionTop > 0) {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });
    
                            verticalLine.css({
                                height: event.pageY - dotPositionTop - 12,
                                top: dotPositionTop - imageBlock.offset().top + 12
                            });
    
                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: dotPositionLeft - imageBlock.offset().left,
                                width: event.pageX - dotPositionLeft
                            });
    
                            verticalBendingLine.css({
                                height: event.pageY - elementPointPositionTop - 12,
                                top: elementPointPositionTop - imageBlock.offset().top + 12,
                                left: event.pageX - imageBlock.offset().left
                            });
                        } else {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft) + 1,
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: event.pageY - dotPositionTop - 12,
                                top: dotPositionTop - imageBlock.offset().top + 12
                            });
                            
                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: dotPositionLeft - imageBlock.offset().left,
                                width: event.pageX - dotPositionLeft
                            });
                            
                            verticalBendingLine.css({
                                height: elementPointPositionTop - event.pageY + 12,
                                top: event.pageY - imageBlock.offset().top,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }                        
                    } else {       
                        if (event.pageY - elementPointPositionTop > 0) {                 
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12 - 1,
                                left: dotPositionLeft - imageBlock.offset().left,
                                width: event.pageX - dotPositionLeft
                            });

                            verticalBendingLine.css({
                                height: event.pageY - elementPointPositionTop - 12,
                                top: elementPointPositionTop - imageBlock.offset().top + 12,
                                left: event.pageX - imageBlock.offset().left
                            });     
                        } else {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12 - 1,
                                left: dotPositionLeft - imageBlock.offset().left,
                                width: event.pageX - dotPositionLeft
                            });

                            verticalBendingLine.css({
                                height: elementPointPositionTop - event.pageY + 12,
                                top: event.pageY - imageBlock.offset().top,
                                left: event.pageX - imageBlock.offset().left
                            }); 
                        }
                    }
                } else {
                    if (event.pageY - dotPositionTop > 0) {
                        if (event.pageY - elementPointPositionTop > 0) {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: event.pageY - dotPositionTop - 12,
                                top: dotPositionTop - imageBlock.offset().top + 12
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: event.pageX - imageBlock.offset().left,
                                width: dotPositionLeft - event.pageX
                            });

                            verticalBendingLine.css({
                                height: event.pageY - elementPointPositionTop - 12,
                                top: elementPointPositionTop - imageBlock.offset().top + 12,
                                left: event.pageX - imageBlock.offset().left
                            });
                        } else {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: event.pageY - dotPositionTop - 12,
                                top: dotPositionTop - imageBlock.offset().top + 12
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: event.pageX - imageBlock.offset().left,
                                width: dotPositionLeft - event.pageX
                            });

                            verticalBendingLine.css({
                                height: elementPointPositionTop - event.pageY + 12,
                                top: event.pageY - imageBlock.offset().top,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }
                    } else {
                        if (event.pageY - elementPointPositionTop > 0) {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: dotPositionTop - event.pageY - 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: event.pageX - imageBlock.offset().left,
                                width: dotPositionLeft - event.pageX
                            });

                            verticalBendingLine.css({
                                height: event.pageY - elementPointPositionTop - 12,
                                top: elementPointPositionTop - imageBlock.offset().top + 12,
                                left: event.pageX - imageBlock.offset().left
                            });
                        } else {
                            horizontalLine.css({
                                width: Math.abs(elementPointPositionLeft - dotPositionLeft) - (event.pageX - dotPositionLeft),
                                left: (dotPositionLeft - imageBlock.offset().left + event.pageX - dotPositionLeft)
                            });

                            verticalLine.css({
                                height: dotPositionTop - event.pageY - 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                top: dotPositionTop - imageBlock.offset().top + 12 + event.pageY - dotPositionTop - 12,
                                left: event.pageX - imageBlock.offset().left,
                                width: dotPositionLeft - event.pageX
                            });

                            verticalBendingLine.css({
                                height: elementPointPositionTop - event.pageY + 12,
                                top: event.pageY - imageBlock.offset().top,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }
                    }
                }
            } else {
                if (event.pageX - dotPositionLeft > 0) {
                    if (event.pageY - dotPositionTop > 0) {        
                        if (event.pageX - elementPointPositionLeft > 0) {               
                            horizontalLine.css({
                                width: event.pageX - dotPositionLeft - 12,
                                left: dotPositionLeft - imageBlock.offset().left + 12,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: event.pageX - elementPointPositionLeft - 12,
                                left: elementPointPositionLeft - imageBlock.offset().left + 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: event.pageY - dotPositionTop,
                                top: dotPositionTop - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });
                        } else {
                            horizontalLine.css({
                                width: event.pageX - dotPositionLeft - 12,
                                left: dotPositionLeft - imageBlock.offset().left + 12,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: elementPointPositionLeft - event.pageX + 12,
                                left: event.pageX - imageBlock.offset().left,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: event.pageY - dotPositionTop,
                                top: dotPositionTop - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }
                    } else {
                        if (event.pageX - elementPointPositionLeft > 0) {
                            horizontalLine.css({
                                width: event.pageX - dotPositionLeft - 12,
                                left: dotPositionLeft - imageBlock.offset().left + 12,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: event.pageX - elementPointPositionLeft - 12,
                                left: elementPointPositionLeft - imageBlock.offset().left + 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });                        
                        } else {
                            horizontalLine.css({
                                width: event.pageX - dotPositionLeft - 12,
                                left: dotPositionLeft - imageBlock.offset().left + 12,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: elementPointPositionLeft - event.pageX + 12,
                                left: event.pageX - imageBlock.offset().left,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            }); 
                        }
                    }
                } else {
                    if (event.pageY - dotPositionTop > 0) {
                        if (event.pageX - elementPointPositionLeft > 0) {
                            horizontalLine.css({
                                width: dotPositionLeft - event.pageX,
                                left: event.pageX - imageBlock.offset().left,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: event.pageX - elementPointPositionLeft - 12,
                                left: elementPointPositionLeft - imageBlock.offset().left + 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: event.pageY - dotPositionTop,
                                top: dotPositionTop - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });
                        } else {
                            horizontalLine.css({
                                width: dotPositionLeft - event.pageX,
                                left: event.pageX - imageBlock.offset().left,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            });

                            horizontalBendingLine.css({
                                width: elementPointPositionLeft - event.pageX + 12,
                                left: event.pageX - imageBlock.offset().left,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: event.pageY - dotPositionTop,
                                top: dotPositionTop - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }
                    } else {
                        if (event.pageX - elementPointPositionLeft > 0) {
                            horizontalLine.css({
                                width: dotPositionLeft - event.pageX,
                                left: event.pageX - imageBlock.offset().left,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            }); 

                            horizontalBendingLine.css({
                                width: event.pageX - elementPointPositionLeft - 12,
                                left: elementPointPositionLeft - imageBlock.offset().left + 12,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });          
                        } else {
                            horizontalLine.css({
                                width: dotPositionLeft - event.pageX,
                                left: event.pageX - imageBlock.offset().left,
                                top: dotPositionTop - imageBlock.offset().top
                            });

                            verticalLine.css({
                                height: elementPointPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top
                            }); 

                            horizontalBendingLine.css({
                                width: elementPointPositionLeft - event.pageX + 12,
                                left: event.pageX - imageBlock.offset().left,
                                top: event.pageY - imageBlock.offset().top
                            });

                            verticalBendingLine.css({
                                height: dotPositionTop - event.pageY,
                                top: event.pageY - imageBlock.offset().top ,
                                left: event.pageX - imageBlock.offset().left
                            });
                        }              
                    }
                }
            }
        }
    });

    // Клик по точке изгиба
    $('.trailer-image').on('click', '.trailer-image-bendingPoint', function(event) {
        if (!$(this).hasClass('_selected')) {
            event.stopPropagation();
            $('.trailer-content-item._withLines').removeClass('_selected');
            $('.trailer-image-bendingPoint').removeClass('_selected');
            $(this).addClass('_selected');
        }
    });
});