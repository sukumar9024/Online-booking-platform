document.addEventListener("DOMContentLoaded", function() {
    // Mock data for demonstration purposes
    var trainsData = [
        {
            trainName: "K. S. R. Bengaluru Rajdhani Express",
            runningDays: "MON, TUE, WED, THUR, FRI, SAT, SUN",
            startTime: "17:25:00",
            destinationTime: "05:20:00",
            categories: [
                { name: "AC3", seatsAvailable: 50 },
                { name: "AC2", seatsAvailable: 30 },
                { name: "AC1", seatsAvailable: 20 }
            ]
        },
        // Add more train data objects as needed
    ];

    // Function to create train boxes dynamically
    function createTrainBoxes() {
        var trainContainer = document.getElementById("train-container");

        trainsData.forEach(function(train) {
            var trainBox = document.createElement("div");
            trainBox.classList.add("train-box");

            var trainName = document.createElement("div");
            trainName.classList.add("train-name");
            trainName.textContent = train.trainName;

            var trainInfo = document.createElement("div");
            trainInfo.classList.add("train-info");
            trainInfo.textContent = "Start Time: " + train.startTime + " - Destination Time: " + train.destinationTime;

            var runningDays = document.createElement("div");
            runningDays.textContent = "Running Days: " + train.runningDays;

            var categories = document.createElement("div");
            categories.classList.add("train-categories");

            train.categories.forEach(function(category) {
                var categoryElement = document.createElement("div");
                categoryElement.classList.add("train-category");
                categoryElement.textContent = category.name + " (" + category.seatsAvailable + " seats)";
                categories.appendChild(categoryElement);
            });

            trainBox.appendChild(trainName);
            trainBox.appendChild(runningDays);
            trainBox.appendChild(trainInfo);
            trainBox.appendChild(categories);
            trainContainer.appendChild(trainBox);
        });
    }

    // Call the function to create train boxes when the page loads
    createTrainBoxes();
});
