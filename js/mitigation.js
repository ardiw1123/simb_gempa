// js/mitigation.js

function showLevel1() {
  hideAllLevels();
  document.getElementById("level1").classList.add("active");
}

function showLevel2(phase) {
  hideAllLevels();
  document.getElementById("level2-" + phase).classList.add("active");
}

function showLevel3(topic) {
  hideAllLevels();
  document.getElementById("level3-" + topic).classList.add("active");
  window.scrollTo({ top: 0, behavior: "smooth" });
}

function showEmergency() {
  hideAllLevels();
  document.getElementById("modal-emergency").classList.add("active");
  window.scrollTo({ top: 0, behavior: "smooth" });
}

function hideAllLevels() {
  const levels = document.querySelectorAll(".mitigation-level");
  levels.forEach((level) => {
    level.classList.remove("active");
  });
}

// Init: Show Level 1
document.addEventListener("DOMContentLoaded", function () {
  showLevel1();
});
