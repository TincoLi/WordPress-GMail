function logFormResponse(e) {
  var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("ContactForms");
  sheet.appendRow([new Date(), e.namedValues["Email"], e.namedValues["Message"]]);
}
