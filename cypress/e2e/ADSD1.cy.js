describe("Comakership 1 aanmelding ADSD ", () => {
    let editLink, rejectUrl = null;
    const bodyParser = new DOMParser();
    it("Allowes users to go to the right form", () => {
        cy.visit("http://127.0.0.1:8000");
        cy.contains("ADSD Comakership 1").click();

        cy.get('input[name="student_1[first_name]"]').type("John");
        cy.get('input[name="student_1[last_name]"]').type("Doe");
        cy.get('input[name="student_1[student_number]"]').type("s1122334");
        cy.get('input[name="student_1[email]"]').type(
            "s1122334@student.windesheim.nl"
        );
        cy.get('input[name="student_1[ec]"]').type("50");
        cy.get(
            'input[name="student_1[modules][Professionele vaardigheden 1]"'
        ).check();

        cy.get('input[name="student_2[first_name]"]').type("Jane");
        cy.get('input[name="student_2[last_name]"]').type("Doe");
        cy.get('input[name="student_2[student_number]"]').type("s2233445");
        cy.get('input[name="student_2[email]"]').type(
            "s2233445@student.windesheim.nl"
        );
        cy.get('input[name="student_2[ec]"]').type("45");
        cy.get(
            'input[name="student_2[modules][OO programmeren met een web framework (Laravel)]"'
        ).check();

        cy.get('textarea[id^="question-"]').each(($el) => {
            const id = $el.attr("id");
            cy.wrap($el).type(`${id}: cypress test antwoord`);
        });

        cy.get('input[name="analyseren"]').check("2");
        cy.get('input[name="adviseren"]').check("2");
        cy.get('input[name="ontwerpen"]').check("2");
        cy.get('input[name="realiseren"]').check("2");
        cy.get('input[name="manage"]').check("2");

        cy.contains("Tussentijds opslaan").click();
        cy.request("http://localhost:8025/api/v1/messages").then((resp) => {
            cy.request(
                `http://localhost:8025/api/v1/message/${resp.body.messages[0].ID}`
            ).then((mesg) => {
                expect(mesg.body.Subject).to.eq("Temp Save");
                editLink = bodyParser.parseFromString(mesg.body.HTML, 'text/html').getElementById('adjust').getAttribute('href')
            });
        });
    });

    it("submit file temporary", () => {
        cy.visit(editLink);
        cy.get('input[name="student_1[first_name]"]').clear();
        cy.get('input[name="student_1[first_name]"]').type("Arie");
        cy.contains("Aanvraag versturen").click();
        cy.request("http://localhost:8025/api/v1/messages").then((resp) => {
            cy.request(
                `http://localhost:8025/api/v1/message/${resp.body.messages[0].ID}`
            ).then((mesg) => {
                expect(mesg.body.Subject).to.eq(
                    "Nieuwe aanmelding Comakership"
                );
                rejectUrl = bodyParser.parseFromString(mesg.body.HTML, 'text/html').getElementById('reject').getAttribute('href')
            });
        });
    });
    it("Accept file PDF", () =>{
        cy.visit(rejectUrl)
    })
});
