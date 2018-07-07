<footer>
    <script id="dot-template" type="text/template">
        <div class="calendar">
            <header id="calendar-header" class="text-center">
                <p class="month">
                    <button class="clndr-previous-button"">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <span class="month">
                            {{=it.month}}
                        </span>
                    <button class="clndr-next-button"">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </p>
            </header>
            <div id="calendar-body">
                <ul id="daysOfWeek" class="">
                    {{~it.daysOfTheWeek :day:index}}
                    <li>{{=day}}</li>
                    {{~}}
                </ul>
                <ul id="days" class="">
                    {{~it.days :day:index}}
                    <li class="{{=day.classes}}">{{=day.day}}</li>
                    {{~}}
                </ul>
            </div>
        </div>
    </script>
    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/doT.js"></script>
    <script type="text/javascript" src="assets/js/clndr/clndr.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src='https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js'></script>
    <script type="text/javascript" src="assets/js/myScript.js"></script>
</footer>

</body>
</html>