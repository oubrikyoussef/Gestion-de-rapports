// Function to fetch all reports
function fetchRapports() {
    const formData = new FormData(searchForm);
    fetch("./phpActions/rapports/searchRapports.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            displayRapports(data);
        })
        .catch(error => console.error("Error:", error));
}
function searchRapports(event) {
    event.preventDefault();
    fetchRapports();
}
// Function to display reports
function displayRapports(reports) {
    reportsContainer.innerHTML="";
    reports.forEach(report => {
        const reportDiv = createReportDiv(report);
        reportsContainer.appendChild(reportDiv);
    });
}

// Function to create a single report div
function createReportDiv(report) {
    const reportDiv = document.createElement("div");
    reportDiv.classList.add("report", "br-10", "bg-w", "over-hidden");

    const bodyDiv = document.createElement("div");
    bodyDiv.classList.add("body", "pd-inline-1");

    const titleHeading = document.createElement("h2");
    titleHeading.classList.add("box-heading-1", "fz-16");
    titleHeading.textContent = report.Titre_rapport;

    const descriptionParagraph = document.createElement("p");
    descriptionParagraph.classList.add("fz-14", "c-grey");
    descriptionParagraph.textContent = report.Description_rapport;

    const otherInfosDiv = document.createElement("div");
    otherInfosDiv.classList.add("other-infos", "flx-sb-c", "mt-8");

    const adminActionsDiv = document.createElement("div");
    adminActionsDiv.classList.add("admin-actions", "actions");

    const editLink = createLinkElement("#", "edit", "main-tr c-grey edit");
    const editIcon = document.createElement("i");
    editIcon.classList.add("fa-regular", "fa-pen-to-square");
    editLink.appendChild(editIcon);

    const deleteLink = createLinkElement("#", "delete", "main-tr c-grey delete ml-5");
    const deleteIcon = document.createElement("i");
    deleteIcon.classList.add("fa-solid", "fa-trash");
    deleteLink.appendChild(deleteIcon);

    adminActionsDiv.appendChild(editLink);
    adminActionsDiv.appendChild(deleteLink);

    const dateParagraph = document.createElement("p");
    dateParagraph.classList.add("box-paragraph", "mb-0");
    dateParagraph.textContent = "Date de depot : " + report.Date_depot;

    const userActionsDiv = document.createElement("div");
    userActionsDiv.classList.add("user-actions", "actions", "flx");

    const downloadLink = createLinkElement(report.Chemin_fichier, "download", "c-grey main-tr db main-tr", "cahier_de_charge", false);
    const downloadIcon = document.createElement("i");
    downloadIcon.classList.add("fa-solid", "fa-download");
    downloadLink.appendChild(downloadIcon);

    const previewLink = createLinkElement(report.Chemin_fichier, "preview", "c-grey main-tr db ml-5 main-tr preview", false, true);
    const previewIcon = document.createElement("i");
    previewIcon.classList.add("fa-regular", "fa-eye");
    previewLink.appendChild(previewIcon);


    userActionsDiv.appendChild(downloadLink);
    userActionsDiv.appendChild(previewLink);

    otherInfosDiv.appendChild(adminActionsDiv);
    otherInfosDiv.appendChild(dateParagraph);
    otherInfosDiv.appendChild(userActionsDiv);

    bodyDiv.appendChild(titleHeading);
    bodyDiv.appendChild(descriptionParagraph);
    bodyDiv.appendChild(otherInfosDiv);

    reportDiv.appendChild(bodyDiv);

    return reportDiv;
}

// Function to create a link element
function createLinkElement(href, title, className, download = false, targetBlank = false) {
    const link = document.createElement("a");
    link.href = href;
    link.title = title;
    link.className = className; // Set the className directly

    if (download) {
        link.setAttribute("download", download);
    }
    if (targetBlank) {
        link.setAttribute("target", "_blank");
    }

    return link;
}


fetchRapports();
searchForm.addEventListener("submit",searchRapports);