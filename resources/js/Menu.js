// import $ from "jquery";

class Menu {
    //1. describe and create/initiate our object
    constructor() {
        this.document = $(document);
        this.myMenuButton = $("#my-menu-button");
        this.myMobileMenuButton = $("#my-mobile-menu-button");
        this.myOpenMenu = $("#my-open-menu");
        this.myCloseMenu = $("#my-close-menu");
        this.myMenuContent = $("#my-menu-content");
        this.myMobileMenuContent = $("#my-mobile-menu-content");
        this.isOpen = false;
        this.events();
    }

    //2. events
    //on this.head feels cold, wearsHat
    //on this.brain feels hot, goingSwimming
    events() {
        //this.document.on("click", this.resetMenu.bind(this));
        this.myMenuButton.on("click", this.toggleMenu.bind(this)); // function "on" change this from "object" to "html element" => bind "this object" to "this html element"
        this.myMobileMenuButton.on("click", this.toggleMenu.bind(this));
        this.myMenuContent.hide();
        this.myMobileMenuContent.hide();
    }

    //3. methods (function, action...)
    //wearsHat() {}
    //goingSwimming() {}

    toggleMenu() {
        // alert("Inside");
        // $firstSvg = $("#my-menu-button svg::first");
        // $secondSvg = $("#my-menu-button svg.block");
        var firstSvg = this.myOpenMenu;
        // console.log(firstSvg);
        var secondSvg = this.myCloseMenu;
        var myMenuContent = this.myMenuContent;
        var myMobileMenuContent = this.myMobileMenuContent;
        if (this.isOpen == false) {
            firstSvg.addClass("hidden");
            firstSvg.removeClass("block");
            secondSvg.addClass("block");
            secondSvg.removeClass("hidden");
            myMenuContent.show();
            myMobileMenuContent.show();
        }
        else {
            firstSvg.addClass("block");
            firstSvg.removeClass("hidden");
            secondSvg.addClass("hidden");
            secondSvg.removeClass("block");
            myMenuContent.hide();
            myMobileMenuContent.hide();
        }
        this.isOpen = !this.isOpen;
    }

    // resetMenu() {
    //     if (this.isOpen) {
    //         var myMenuContent = this.myMenuContent;
    //         myMenuContent.hide();
    //     }
    // }

}

// export default Menu
const menu = new Menu();
