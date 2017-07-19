/**
 * Password guidelines enforcer and communicator
 */
var PasswordRequirements = {

    /* config can be changed at run-time if needed */
    config: {

        /* Set to true to enable lots of console.logs */
        debug: false,

        /* classsname to be used for guidelines container */
        containerClassName: "passwordGuidelines",

        /* this will be generated in init() based on containerClassName */
        containerSelector: "",

        /* password rating selector */
        passwordRatingQuery: ".password-rating",
        $passwordRating: null,

        /* key names must match key names of validators below */
        validators: {
            passLength: {
                min: 8,
                max: 16
            },
            similar: {
                maxSimilarity: 4
            }
        }
    },

    /**
     * Validators should return one of 3 values:
     *      -1 : do nothing
     *      0  : failed validation
     *      1  : passed validation
     *
     *  ** OR may return a function.  If a function is returned, no UI changed will be made automatically
     *
     * Validators are called with the current entered password and the jquery object representing the password field
     */
    validators: {
        passLength: {
            active: true,
            message: "passwordrequirements.length",
            isValid: function(password, $elm) {
                // Don't start showing error on length requirement UNTIL password has at least made min length
                if(!password || (password.length < PasswordRequirements.config.validators.passLength.min && !$elm.data("validateLength"))) {
                    return -1;
                }
                // We have min chars, start validating
                $elm.data("validateLength", true);

                return (password.length >= PasswordRequirements.config.validators.passLength.min &&
                        password.length <= PasswordRequirements.config.validators.passLength.max) ? 1 : 0;
            }
        },
        alphaNum: {
            active: true,
            message: "passwordrequirements.alphanumeric",
            isValid: function(password, $elm) {
                if(!password) return -1;

                // Don't start showing error until we've met it once
                if(password.match(/[0-9]+/) && password.match(/[a-zA-Z]+/)) {
                    $elm.data("validateAlphanumeric", true);
                    return 1;
                }

                // We've passed before, but are failing now
                if($elm.data("validateAlphanumeric")) {
                    return 0;
                }

                // We havent passed yet
                return -1;
            }
        },
        specialChars: {
            active: true,
            message: "passwordrequirements.specialchars",
            isValid: function(password, $elm) {
                if(!password) return -1;
                return (password.match(/^[\x20-\x7E]+$/)) ? 1 : 0;
            }
        },
        similar: {
            active: true,
            message: "passwordrequirements.similarname",
            isValid: function(password, $elm) {
                var maxSimilarity = PasswordRequirements.config.validators.similar.maxSimilarity;
                var email = $($elm.data("email_field")).val();

                PasswordRequirements.config.debug && console.log("Similarity Compare --- Email: ", email, "Input: ", password);

                if(!email) return -1;

                // Normalize email and password by lowercasing
                email = email.toLowerCase();
                password = password.toLowerCase();

                // If email is empty or if we havent reached the maxSimilarity in length yet, pass
                if(email.length == 0 || password.length <= maxSimilarity) return -1;

                for (var i = 0; i <= email.length - maxSimilarity; i++) {
                    if (password.indexOf(email.substring(i, i + maxSimilarity)) > -1) {
                        return 0;
                    }
                }

                return 1;

            }
        },
        strength: {
            active: true,
            message: "", // none needed, we return a function
            isValid: function(password, $elm) {

                var email              = $($elm.data("email_field")).val(),
                    passLength         = password.length,
                    latinBasicFilter   = new RegExp("^[\x20-\x7E]+$"),
                    requirementsFilter = new RegExp("^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*).+$"),
                    result             = "";

                if(passLength) {
                    if(passLength >= 8) {
                        if(latinBasicFilter.test(password) && requirementsFilter.test(password)) {
                            if(passLength >= 10) {
                                result = "strong";
                            } else {
                                result = "fair";
                            }
                        } else {
                            result = "weak";
                        }
                    } else {
                        result = "short";
                    }
                }

                return function() {
                    if (result) {
                        PasswordRequirements.config.$passwordRating
                            .html(messages["ratings"][result])
                            .removeClass("short weak fair strong")
                            .addClass(result);
                    } else {
                        PasswordRequirements.config.$passwordRating.html("");
                    }
                }

            }
        }
    },

    /**
     * Called automatically with the inclusion of this js
     */
    init: function() {
        PasswordRequirements.config.containerSelector = "." + PasswordRequirements.config.containerClassName;
        PasswordRequirements.config.$passwordRating = $(PasswordRequirements.config.passwordRatingQuery);
    },

    /**
     * Binding and other setup for password field
     *
     * @param $elm jQuery object of the password field
     */
    initField: function($elm) {
        $elm.on("keyup", function() {
            PasswordRequirements.keyupHandler($(this));
        });
        $elm.on("focus", function() {
            PasswordRequirements.focusHandler($(this));
        });
        $elm.on("blur", function() {
            PasswordRequirements.blurHandler($(this));
        });

        if($elm.data("email_field")) {
            $($elm.data("email_field")).on("change keyup", function() {
                if($elm.val().length) {
                    PasswordRequirements.keyupHandler($elm);
                }
            });
        }

    },

    /**
     * Handle keyup (Note: called at the end of focusHandler as well)
     *
     * @param $elm jQuery object of the password field
     */
    keyupHandler: function($elm) {
        PasswordRequirements.config.debug && console.log("keyup:", this);
        $elm.parent().after(this.renderGuidelines($elm));
        PasswordRequirements.clearIfPassing();
    },

    /**
     * Handle field focus
     *
     * @param $elm jQuery object of the password field
     */
    focusHandler: function($elm) {
        PasswordRequirements.config.debug && console.log("focus:", this);
        PasswordRequirements.keyupHandler($elm);
    },

    /**
     * Handle field blur
     */
    blurHandler: function() {
        PasswordRequirements.config.debug && console.log("blur:", this);
        PasswordRequirements.clearIfPassing();
    },

    /**
     * Called as a check, will clear the requirements if all pass
     */
    clearIfPassing: function() {
        if($(PasswordRequirements.config.containerSelector).find(".failing, .neutral").length == 0) {
            $(PasswordRequirements.config.containerSelector).hide();
        }
    },

    /**
     * render the Guidelines box (note: box is rendered in memory here, not actually written to dom)
     *
     * @param $elm jQuery object of the password field
     * @returns {*|jQuery}
     */
    renderGuidelines: function($elm) {
        // Clear any old ones first, redraw every time!
        $(PasswordRequirements.config.containerSelector).remove();

        var $popoverDiv = $("<div />").addClass(PasswordRequirements.config.containerClassName + " popover bottom");
        var $requirements = $("<ul />");

        // Fix some of the default styles on popovers to make them behave like we want
        $popoverDiv.css({"display": "block", "position": "relative", "width": "auto"});

        $popoverDiv.append(
            $("<div />").addClass("arrow").css("left", 25),
            $("<div />").addClass("popover-content").append($requirements)
        );

        $.each(PasswordRequirements.validators, function(idx, validator) {
            // Bail out if not active
            if(!validator.active) return;

            var $requirement = $("<li />");
            var result = validator.isValid($elm.val(), $elm);

            if(typeof result === "function") {
                result();
                return;
            }

            $requirement.text(PasswordRequirements.getPropertyFromString(validator.message, messages).message || validator.message);
            $requirement.prepend($("<i />"));
            $requirements.append($requirement);

            PasswordRequirements.config.debug && console.log(idx + " result: " + result);

            switch(result) {

                case 1:
                    $requirement.addClass("passing muted").find("i").addClass("icon-ok icon-green");
                    break;
                case 0:
                    $requirement.addClass("failing").find("i").addClass("icon-remove icon-red");
                    break;
                default:
                    $requirement.addClass("neutral").find("i").addClass("icon-gray icon-info-circle");
                    break;

            }

        });

        return $popoverDiv;
    },

    /**
     * Helper to get a property from a string in dot notation
     *
     * @param prop string notation of property
     * @param parentObj object to look in, will default to window
     */
    getPropertyFromString: function(prop, parentObj) {
        var bagOfHolding = null; // To hold the value of each iteration
        if(!parentObj) parentObj = window;
        try {
            $.each(prop.split("."), function(idx, val) {
                if(bagOfHolding) {
                    bagOfHolding = bagOfHolding[val];
                } else {
                    bagOfHolding = parentObj[val];
                }
            });
        } catch (e) {
            return prop; // if we fail, return property string
        }
        return bagOfHolding || prop; // if falsy value, return prop
    }

};

/**
 * Initial initialization
 */
$(function() {
    PasswordRequirements.init();
    $("input[type=password].showGuidelines").each(function(){
        PasswordRequirements.config.debug && console.log("Init field", this);
        PasswordRequirements.initField($(this));
    })
});
