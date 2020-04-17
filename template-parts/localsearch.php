<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bmqy-next
 * @since bmqy next 1.1
 */
?>

<?php if(get_option('bmqynext_options_nav_search')==='1'): ?>
<script type="text/javascript">
var isfetched = false;
var isXml = false;

var search_path = "<?php echo get_option('bmqynext_options_localsearch_path') ?>";
if (search_path.length === 0) {
    search_path = "/wp-admin/admin-ajax.php?action=bmqynext_ajax_search_post";
} else if (/xml$/i.test(search_path)) {
    isXml = true;
};
var path = "<?php echo get_site_url() ?>" + search_path;


var onPopupClose = function (e) {
    $('.popup').hide();
    $('#local-search-input').val('');
    $('.search-result-list').remove();
    $('#no-result').remove();
    $(".local-search-pop-overlay").remove();
    $('body').css('overflow', '');
};

function proceedsearch() {
    $("body")
        .append('<div class="search-popup-overlay local-search-pop-overlay"></div>')
        .css('overflow', 'hidden');
    $('.search-popup-overlay').click(onPopupClose);
    $('.popup').toggle();
    var $localSearchInput = $('#local-search-input');
    $localSearchInput.attr("autocapitalize", "none");
    $localSearchInput.attr("autocorrect", "off");
    $localSearchInput.focus();
};


var searchFunc = function(path, search_id, content_id) {
    'use strict';

    $("body")
        .append('<div class="search-popup-overlay local-search-pop-overlay">' +
            '<div id="search-loading-icon">' +
            '<i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>' +
            '</div>' +
            '</div>')
        .css('overflow', 'hidden');
    $("#search-loading-icon").css('margin', '20% auto 0 auto').css('text-align', 'center');

    $.ajax({
        url: path,
        dataType: isXml ? "xml" : "json",
        async: true,
        success: function(res) {
            isfetched = true;
            $('.popup').detach().appendTo('.header-inner');
            var datas = isXml ? $("entry", res).map(function() {
                return {
                    title: $("title", this).text(),
                    content: $("content",this).text(),
                    url: $("url" , this).text()
                };
            }).get() : res;
            var input = document.getElementById(search_id);
            var resultContent = document.getElementById(content_id);
            var inputEventFunction = function() {
                var searchText = input.value.trim().toLowerCase();
                var keywords = searchText.split(/[\s\-]+/);
                if (keywords.length > 1) {
                    keywords.push(searchText);
                };
                var resultItems = [];
                if (searchText.length > 0) {

                    datas.forEach(function(data) {
                        var isMatch = false;
                        var hitCount = 0;
                        var searchTextCount = 0;
                        var title = data.title.trim();
                        var titleInLowerCase = title.toLowerCase();
                        var content = data.content.trim().replace(/<[^>]+>/g,"");
                        var contentInLowerCase = content.toLowerCase();
                        var articleUrl = decodeURIComponent(data.url);
                        var indexOfTitle = [];
                        var indexOfContent = [];

                        if(title != '') {
                            keywords.forEach(function(keyword) {
                                function getIndexByWord(word, text, caseSensitive) {
                                    var wordLen = word.length;
                                    if (wordLen === 0) {
                                        return [];
                                    }
                                    var startPosition = 0, position = [], index = [];
                                    if (!caseSensitive) {
                                        text = text.toLowerCase();
                                        word = word.toLowerCase();
                                    }
                                    while ((position = text.indexOf(word, startPosition)) > -1) {
                                        index.push({position: position, word: word});
                                        startPosition = position + wordLen;
                                    }
                                    return index;
                                };

                                indexOfTitle = indexOfTitle.concat(getIndexByWord(keyword, titleInLowerCase, false));
                                indexOfContent = indexOfContent.concat(getIndexByWord(keyword, contentInLowerCase, false));
                            });
                            if (indexOfTitle.length > 0 || indexOfContent.length > 0) {
                                isMatch = true;
                                hitCount = indexOfTitle.length + indexOfContent.length;
                            }
                        };

                        if (isMatch) {

                            [indexOfTitle, indexOfContent].forEach(function (index) {
                                index.sort(function (itemLeft, itemRight) {
                                    if (itemRight.position !== itemLeft.position) {
                                        return itemRight.position - itemLeft.position;
                                    } else {
                                        return itemLeft.word.length - itemRight.word.length;
                                    }
                                });
                            });

                            function mergeIntoSlice(text, start, end, index) {
                                var item = index[index.length - 1];
                                var position = item.position;
                                var word = item.word;
                                var hits = [];
                                var searchTextCountInSlice = 0;
                                while (position + word.length <= end && index.length != 0) {
                                    if (word === searchText) {
                                        searchTextCountInSlice++;
                                    }
                                    hits.push({position: position, length: word.length});
                                    var wordEnd = position + word.length;


                                    index.pop();
                                    while (index.length != 0) {
                                        item = index[index.length - 1];
                                        position = item.position;
                                        word = item.word;
                                        if (wordEnd > position) {
                                            index.pop();
                                        } else {
                                            break;
                                        }
                                    }
                                };
                                searchTextCount += searchTextCountInSlice;
                                return {
                                    hits: hits,
                                    start: start,
                                    end: end,
                                    searchTextCount: searchTextCountInSlice
                                };
                            };

                            var slicesOfTitle = [];
                            if (indexOfTitle.length != 0) {
                                slicesOfTitle.push(mergeIntoSlice(title, 0, title.length, indexOfTitle));
                            };

                            var slicesOfContent = [];
                            while (indexOfContent.length != 0) {
                                var item = indexOfContent[indexOfContent.length - 1];
                                var position = item.position;
                                var word = item.word;

                                var start = position - 20;
                                var end = position + 80;
                                if(start < 0){
                                    start = 0;
                                };
                                if (end < position + word.length) {
                                    end = position + word.length;
                                };
                                if(end > content.length){
                                    end = content.length;
                                };
                                slicesOfContent.push(mergeIntoSlice(content, start, end, indexOfContent));
                            };

                            slicesOfContent.sort(function (sliceLeft, sliceRight) {
                                if (sliceLeft.searchTextCount !== sliceRight.searchTextCount) {
                                    return sliceRight.searchTextCount - sliceLeft.searchTextCount;
                                } else if (sliceLeft.hits.length !== sliceRight.hits.length) {
                                    return sliceRight.hits.length - sliceLeft.hits.length;
                                } else {
                                    return sliceLeft.start - sliceRight.start;
                                }
                            });



                            var upperBound = parseInt('1');
                            if (upperBound >= 0) {
                                slicesOfContent = slicesOfContent.slice(0, upperBound);
                            };

                            function highlightKeyword(text, slice) {
                                var result = '';
                                var prevEnd = slice.start;
                                slice.hits.forEach(function (hit) {
                                    result += text.substring(prevEnd, hit.position);
                                    var end = hit.position + hit.length;
                                    result += '<b class="search-keyword">' + text.substring(hit.position, end) + '</b>';
                                    prevEnd = end;
                                });
                                result += text.substring(prevEnd, slice.end);
                                return result;
                            }

                            var resultItem = '';

                            if (slicesOfTitle.length != 0) {
                                resultItem += "<li><a href='" + articleUrl + "' class='search-result-title'>" + highlightKeyword(title, slicesOfTitle[0]) + "</a>";
                            } else {
                                resultItem += "<li><a href='" + articleUrl + "' class='search-result-title'>" + title + "</a>";
                            }

                            slicesOfContent.forEach(function (slice) {
                                resultItem += "<a href='" + articleUrl + "'>" +
                                    "<p class=\"search-result\">" + highlightKeyword(content, slice) +
                                    "...</p>" + "</a>";
                            });

                            resultItem += "</li>";
                            resultItems.push({
                                item: resultItem,
                                searchTextCount: searchTextCount,
                                hitCount: hitCount,
                                id: resultItems.length
                            });
                        }
                    })
                };
                if (keywords.length === 1 && keywords[0] === "") {
                    resultContent.innerHTML = '<div id="no-result"><i class="fa fa-search fa-5x" /></div>'
                } else if (resultItems.length === 0) {
                    resultContent.innerHTML = '<div id="no-result"><i class="fa fa-frown-o fa-5x" /></div>'
                } else {
                    resultItems.sort(function (resultLeft, resultRight) {
                        if (resultLeft.searchTextCount !== resultRight.searchTextCount) {
                            return resultRight.searchTextCount - resultLeft.searchTextCount;
                        } else if (resultLeft.hitCount !== resultRight.hitCount) {
                            return resultRight.hitCount - resultLeft.hitCount;
                        } else {
                            return resultRight.id - resultLeft.id;
                        }
                    });
                    var searchResultList = '<ul class=\"search-result-list\">';
                    resultItems.forEach(function (result) {
                        searchResultList += result.item;
                    });
                    searchResultList += "</ul>";
                    resultContent.innerHTML = searchResultList;
                }
            };

            if ('auto' === 'auto') {
                input.addEventListener('input', inputEventFunction);
            } else {
                $('.search-icon').click(inputEventFunction);
                input.addEventListener('keypress', function (event) {
                    if (event.keyCode === 13) {
                        inputEventFunction();
                    }
                });
            }


            $(".local-search-pop-overlay").remove();
            $('body').css('overflow', '');

            proceedsearch();
        }
    });
};


$('.popup-trigger').click(function(e) {
    e.stopPropagation();
    if (isfetched === false) {
        searchFunc(path, 'local-search-input', 'local-search-result');
    } else {
        proceedsearch();
    };
});

$('.popup-btn-close').click(onPopupClose);
$('.popup').click(function(e){
    e.stopPropagation();
});
$(document).on('keyup', function (event) {
    var shouldDismissSearchPopup = event.which === 27 &&
        $('.search-popup').is(':visible');
    if (shouldDismissSearchPopup) {
        onPopupClose();
    }
});
</script>
<?php endif; ?>