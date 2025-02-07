<script>
    function updateDateTime() {
        const now = new Date();

        // Update digital clock
        @if(config('startpage.live_clock'))
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        @endif

        // Update date
        @if(config('startpage.show_date'))
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('en-NL', options);
        @endif

        // Update countdown
        @if(filled(config('startpage.business_hours_countdown')))
            updateCountdown();
        @endif
    }

    function updateCountdown() {
        const now = new Date();
        const currentHour = now.getHours();
        const currentMinute = now.getMinutes();
        const currentSeconds = now.getSeconds();

        let targetTime = new Date(now);
        let countdownMessage = "";

        // If it's before 17:30, count down to end of work day
        if (currentHour < 17 || (currentHour === 17 && currentMinute < 30)) {
            targetTime.setHours(17, 30, 0);
            countdownMessage = "Time until end of work: ";
        } else {
            // If it's after 17:30, count down to next work day at 9:00
            targetTime.setDate(targetTime.getDate() + 1);
            targetTime.setHours(9, 0, 0);
            countdownMessage = "Time until start of work: ";
        }

        const timeDiff = targetTime - now;

        const hoursLeft = Math.floor(timeDiff / (1000 * 60 * 60));
        const minutesLeft = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
        const secondsLeft = Math.floor((timeDiff % (1000 * 60)) / 1000);

        const countdownElement = document.getElementById('countdown');
        countdownElement.textContent = `${countdownMessage}${String(hoursLeft).padStart(2, '0')}:${String(minutesLeft).padStart(2, '0')}:${String(secondsLeft).padStart(2, '0')}`;
    }

    // Update immediately and then every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>