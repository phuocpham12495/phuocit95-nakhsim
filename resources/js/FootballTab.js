class FootballTab {

    constructor() {
        this.document = $(document);
        this.myFootballTabCountries = $("#my-footballtab-countries");
        this.myFootballTabCompetitions = $("#my-footballtab-competitions");
        this.myFootballTabTeams = $("#my-footballtab-teams");
        this.myFootballTabPlayers = $("#my-footballtab-players");

        this.myFCountriesLC = $("#my-FCountriesLC");
        this.myFCompetitionsLC = $("#my-FCompetitionsLC");
        this.myFTeams = $("#my-FTeams");
        this.myFPlayersLC = $("#my-FPlayersLC");

        this.isOpen = false;
        this.events();
    }

    events() {
        //this.document.on("click", this.resetMenu.bind(this));
        this.myFootballTabCountries.on("click", this.openFTCountries.bind(this));
        this.myFootballTabCompetitions.on("click", this.openFTCompetitions.bind(this));
        this.myFootballTabTeams.on("click", this.openFTTeams.bind(this));
        this.myFootballTabPlayers.on("click", this.openFTPlayers.bind(this));
    }

    openFTCountries() {
        this.myFCountriesLC.show();
        this.myFCompetitionsLC.hide();
        this.myFTeams.hide();
        this.myFPlayersLC.hide();

        this.myFootballTabCountries.addClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabCompetitions.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabTeams.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabPlayers.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");

    }

    openFTCompetitions() {
        this.myFCountriesLC.hide();
        this.myFCompetitionsLC.show();
        this.myFTeams.hide();
        this.myFPlayersLC.hide();

        this.myFootballTabCountries.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabCompetitions.addClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabTeams.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabPlayers.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
    }

    openFTTeams() {
        this.myFCompetitionsLC.hide();
        this.myFCountriesLC.hide();
        this.myFTeams.show();
        this.myFPlayersLC.hide();

        this.myFootballTabCountries.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabCompetitions.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabTeams.addClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabPlayers.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
    }

    openFTPlayers() {
        this.myFCompetitionsLC.hide();
        this.myFCountriesLC.hide();
        this.myFTeams.hide();
        this.myFPlayersLC.show();

        this.myFootballTabCountries.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabCompetitions.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabTeams.removeClass("text-blue-500 border-b-2 font-medium border-blue-500");
        this.myFootballTabPlayers.addClass("text-blue-500 border-b-2 font-medium border-blue-500");
    }
}

// export default Menu
const footballTab = new FootballTab();
