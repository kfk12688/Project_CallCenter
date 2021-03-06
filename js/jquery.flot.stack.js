/* the norm */
#gritter-notice-wrapper {
	position:fixed;
	top:20px;
	right:20px;
	width:301px;
	z-index:9999;
}

#gritter-notice-wrapper.top-left {
    left: 20px;
    right: auto;
}

#gritter-notice-wrapper.bottom-right {
    top: auto;
    left: auto;
    bottom: 20px;
    right: 20px;
}

#gritter-notice-wrapper.bottom-left {
    top: auto;
    right: auto;
    bottom: 20px;
    left: 20px;
}

.gritter-item-wrapper {
	position:relative;
	margin:0 0 10px 0;
}

.gritter-item {
	background-color: rgba(0,0,0,0.8);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc000000', endColorstr='#cc000000',GradientType=0 ); /* IE6-8 */
	color:#fff;
	padding:15px;
	font-size: 11px;
	-webkit-border-radius: 4px !important;
       -moz-border-radius: 4px !important;
	        border-radius: 4px !important;
	-webkit-box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
       -moz-box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
	       	box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
}

.hover .gritter-item {}

.gritter-item p {
	padding:0;
	margin:0;
	word-wrap:break-word;
}

.gritter-close {
	display:none;
	position:absolute;
	top:5px;
	right:5px;
	cursor:pointer;
	width:12px;
	height:12px;
	background: url(../img/close-button-white.png);
	opacity: .6;
  
}

.gritter-title {
	font-size:14px;
	font-weight:bold;
	padding:0 0 7px 0;
	display:block;
	text-shadow:1px 1px 0 #000; /* Not supported by IE :( */
}

.gritter-image {
	width:48px;
	height:48px;
	float:left;
	margin: -5px 5px 5px -5px;
}

.gritter-with-image,
.gritter-without-image {
	padding:0;
}

.gritter-with-image {
	width:220px;
	float:right;
}

/* for the light (white) version of the gritter notice */
.gritter-light .gritter-item {
	background-color: rgba(255,255,255,0.8);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ccFFFFFF', endColorstr='#ccFFFFFF',GradientType=0 ); /* IE6-8 */
    color: #646464 !important;
	-webkit-box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
       -moz-box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
         	box-shadow: 0px 1px 1px rgba(0,0,0,0.25);
}

.gritter-light .gritter-close {
	background: url(../img/close-button.png);
}


.gritter-light .gritter-title {
	color: #646464 !important;
    text-shadow: none !important;
}                                                                                                                                                                                                                                                                                                                                            keyOffset = horizontal ? 1 : 0,
                accumulateOffset = horizontal ? 0 : 1,
                i = 0, j = 0, l;

            while (true) {
                if (i >= points.length)
                    break;

                l = newpoints.length;

                if (points[i] == null) {
                    // copy gaps
                    for (m = 0; m < ps; ++m)
                        newpoints.push(points[i + m]);
                    i += ps;
                }
                else if (j >= otherpoints.length) {
                    // for lines, we can't use the rest of the points
                    if (!withlines) {
                        for (m = 0; m < ps; ++m)
                            newpoints.push(points[i + m]);
                    }
                    i += ps;
                }
                else if (otherpoints[j] == null) {
                    // oops, got a gap
                    for (m = 0; m < ps; ++m)
                        newpoints.push(null);
                    fromgap = true;
                    j += otherps;
                }
                else {
                    // cases where we actually got two points
                    px = points[i + keyOffset];
                    py = points[i + accumulateOffset];
                    qx = otherpoints[j + keyOffset];
                    qy = otherpoints[j + accumulateOffset];
                    bottom = 0;

                    if (px == qx) {
                        for (m = 0; m < ps; ++m)
                            newpoints.push(points[i + m]);

                        newpoints[l + accumulateOffset] += qy;
                        bottom = qy;
                        
                        i += ps;
                        j += otherps;
                    }
                    else if (px > qx) {
                        // we got past point below, might need to
                        // insert interpolated extra point
                        if (withlines && i > 0 && points[i - ps] != null) {
                            intery = py + (points[i - ps + accumulateOffset] - py) * (qx - px) / (points[i - ps + keyOffset] - px);
                            newpoints.push(qx);
                            newpoints.push(intery + qy);
                            for (m = 2; m < ps; ++m)
                                newpoints.push(points[i + m]);
                            bottom = qy; 
                        }

                        j += otherps;
                    }
                    else { // px < qx
                        if (fromgap && withlines) {
                            // if we come from a gap, we just skip this point
                            i += ps;
                            continue;
                        }
                            
                        for (m = 0; m < ps; ++m)
                            newpoints.push(points[i + m]);
                        
                        // we might be able to interpolate a point below,
                        // this can give us a better y
                        if (withlines && j > 0 && otherpoints[j - otherps] != null)
                            bottom = qy + (otherpoints[j - otherps + accumulateOffset] - qy) * (px - qx) / (otherpoints[j - otherps + keyOffset] - qx);

                        newpoints[l + accumulateOffset] += bottom;
                        
                        i += ps;
                    }

                    fromgap = false;
                    
                    if (l != newpoints.length && withbottom)
                        newpoints[l + 2] += bottom;
                }

                // maintain the line steps invariant
                if (withsteps && l != newpoints.length && l > 0
                    && newpoints[l] != null
                    && newpoints[l] != newpoints[l - ps]
                    && newpoints[l + 1] != newpoints[l - ps + 1]) {
                    for (m = 0; m < ps; ++m)
                        newpoints[l + ps + m] = newpoints[l + m];
                    newpoints[l + 1] = newpoints[l - ps + 1];
                }
            }

            datapoints.points = newpoints;
        }
        
        plot.hooks.processDatapoints.push(stackData);
    }
    
    $.plot.plugins.push({
        init: init,
        options: options,
        name: 'stack',
        version: '1.2'
    });
})(jQuery);
