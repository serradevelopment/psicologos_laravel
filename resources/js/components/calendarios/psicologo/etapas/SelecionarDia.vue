<template>
  <transition appear name="fade">
    <div class="elegant-calencar" v-show="day == null">
      <button class="btn btn-primary" id="reset">Limpar</button>
      <div id="header-calendar">
        <div class="col-md-2 pre-button">
          <i class="fas fa-angle-left"></i>
        </div>

        <div class="col-md-8">
          <div class="head-day"></div>
          <div class="head-month"></div>
        </div>

        <div class="col-md-2 next-button">
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
      <table id="calendar">
        <thead>
          <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sáb</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </transition>
</template>

<script>
export default {
  computed: {
    day: function() {
      return this.$store.state.day;
    },
    schedule: function() {
      return this.$store.state.schedule;
    },
    user: function() {
      return this.$store.state.user;
    },
    users: function() {
      return this.$store.state.users;
    }
  },
  created() {
    var vuex = this.$store;

    document.addEventListener(
      "DOMContentLoaded",
      function() {
        var today = new Date(),
          year = today.getFullYear(),
          month = today.getMonth(),
          monthTag = [
            "Jan",
            "Fev",
            "Mar",
            "Abr",
            "Mai",
            "Jun",
            "Jul",
            "Ago",
            "Set",
            "Out",
            "Nov",
            "Dez"
          ],
          day = today.getDate(),
          days = document.getElementsByTagName("td"),
          selectedDay,
          setDate,
          daysLen = days.length;

        function Calendar(selector, options) {
          this.options = options;
          this.draw();
        }

        Calendar.prototype.draw = function() {
          this.getCookie("selected_day");
          this.getOptions();
          this.drawDays();
          var that = this,
            reset = document.getElementById("reset"),
            pre = document.getElementsByClassName("pre-button"),
            next = document.getElementsByClassName("next-button");

          pre[0].addEventListener("click", function() {
            that.preMonth();
          });
          next[0].addEventListener("click", function() {
            that.nextMonth();
          });
          reset.addEventListener("click", function() {
            that.reset();
          });
          while (daysLen--) {
            days[daysLen].addEventListener("click", function() {
              that.clickDay(this);
            });
          }
        };

        Calendar.prototype.drawHeader = function(e) {
          var headDay = document.getElementsByClassName("head-day"),
            headMonth = document.getElementsByClassName("head-month");

          e ? (headDay[0].innerHTML = e) : (headDay[0].innerHTML = day);
          headMonth[0].innerHTML = monthTag[month] + " - " + year;
        };

        Calendar.prototype.drawDays = function() {
          var formatedMonth = parseInt(month) + 1;
          var startDay = new Date(year, month, 1).getDay(),
            nDays = new Date(year, month + 1, 0).getDate(),
            n = startDay;
          for (var k = 0; k < 42; k++) {
            days[k].innerHTML = "";
            days[k].id = "";
            days[k].className = "";
          }
          if (formatedMonth <= 9) {
            formatedMonth = "0" + formatedMonth;
          }
          for (var i = 1; i <= nDays; i++) {
            if (i <= 9) {
              i = "0" + i;
            }
            var fullDay = new Date(formatedMonth + "/" + i + "/" + year);
            var todayy = new Date();

            if (todayy < fullDay || (todayy.getDate() == fullDay.getDate() && todayy.getMonth() == fullDay.getMonth())) {
              days[n].innerHTML = i;
              n++;
            } else {
              days[n].innerHTML = '';
              n++;
            }
          }

          for (var j = 0; j < 42; j++) {
            if (days[j].innerHTML === "") {
              days[j].id = "disabled";
            } else if (j === day + startDay - 1) {
              if (
                (this.options &&
                  month === setDate.getMonth() &&
                  year === setDate.getFullYear()) ||
                (!this.options &&
                  month === today.getMonth() &&
                  year === today.getFullYear())
              ) {
                this.drawHeader(day);
                days[j].id = "today";
              }
            }
            if (selectedDay) {
              if (
                j === selectedDay.getDate() + startDay - 1 &&
                month === selectedDay.getMonth() &&
                year === selectedDay.getFullYear()
              ) {
                days[j].className = "selected";
                this.drawHeader(selectedDay.getDate());
              }
            }
          }
        };

        Calendar.prototype.clickDay = function(o) {
          var selected = document.getElementsByClassName("selected"),
            len = selected.length;
          if (len !== 0) {
            selected[0].className = "";
          }
          o.className = "selected";
          selectedDay = new Date(year, month, o.innerHTML);
          this.drawHeader(o.innerHTML);
          this.setCookie("selected_day", 1);

          if (o.innerHTML != "") {
            var day = parseInt(o.innerHTML);
            var formatedMonth = parseInt(month) + 1;

            if (day <= 9) {
              day = "0" + day;
            }
            if (formatedMonth <= 9) {
              formatedMonth = "0" + formatedMonth;
            }
            vuex.state.day = day;
            vuex.state.month = formatedMonth;
            vuex.state.year = year;
            vuex.commit("getSchedulesAvaibleToPsico");
          }
        };

        Calendar.prototype.preMonth = function() {
          if (month < 1) {
            month = 11;
            year = year - 1;
          } else {
            month = month - 1;
          }
          this.drawHeader(1);
          this.drawDays();
        };

        Calendar.prototype.nextMonth = function() {
          if (month >= 11) {
            month = 0;
            year = year + 1;
          } else {
            month = month + 1;
          }
          this.drawHeader(1);
          this.drawDays();
        };

        Calendar.prototype.getOptions = function() {
          if (this.options) {
            var sets = this.options.split("-");
            setDate = new Date(sets[0], sets[1] - 1, sets[2]);
            day = setDate.getDate();
            year = setDate.getFullYear();
            month = setDate.getMonth();
          }
        };

        Calendar.prototype.reset = function() {
          month = today.getMonth();
          year = today.getFullYear();
          day = today.getDate();
          this.options = undefined;
          this.drawDays();
        };

        Calendar.prototype.setCookie = function(name, expiredays) {
          if (expiredays) {
            var date = new Date();
            date.setTime(date.getTime() + expiredays * 24 * 60 * 60 * 1000);
            var expires = "; expires=" + date.toGMTString();
          } else {
            var expires = "";
          }
          document.cookie = name + "=" + selectedDay + expires + "; path=/";
        };

        Calendar.prototype.getCookie = function(name) {
          if (document.cookie.length) {
            var arrCookie = document.cookie.split(";"),
              nameEQ = name + "=";
            for (var i = 0, cLen = arrCookie.length; i < cLen; i++) {
              var c = arrCookie[i];
              while (c.charAt(0) == " ") {
                c = c.substring(1, c.length);
              }
              if (c.indexOf(nameEQ) === 0) {
                selectedDay = new Date(c.substring(nameEQ.length, c.length));
              }
            }
          }
        };
        var calendar = new Calendar();
      },
      false
    );
  }
};
</script>

