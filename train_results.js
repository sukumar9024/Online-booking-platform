document.addEventListener("DOMContentLoaded", function() {
    // Retrieve trainsData from session storage
    var trainsData = sessionStorage.getItem("trainsData");
    console.log("Hello");

    // Parse JSON string to JavaScript object
    trainsData = JSON.parse(trainsData);

    // Function to create train boxes dynamically
    function createTrainBoxes() {
        var trainContainer = document.getElementById("train-container");
        console.log("Hello_1");
        if(trainsData){
            trainsData.forEach(function(train) {
                console.log("IN THE Create Train Boxex")
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
    }

    // Call the function to create train boxes when the page loads
    createTrainBoxes();
});
