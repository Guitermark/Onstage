describe("Comakership 1 aanmelding ADSD ", () => {
    it("Allowes users to go to the right form", () => {
        cy.visit("http://127.0.0.1:8000");
        cy.contains("ADSD eerste").click();

        cy.get('input[name="student_1[first_name]"]').type("John");
        cy.get('input[name="student_1[last_name]"]').type("Doe");
        cy.get('input[name="student_1[student_number]"]').type("s1122334");
        cy.get('input[name="student_1[email]"]').type(
            "s1122334@student.windesheim.nl"
        );
        cy.get('input[name="student_1[ec]"]').type("50");
        cy.get(
            'input[name="student_1[modules][project software development]"'
        ).check();
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
        cy.get('input[name="student_2[modules][Software Quality]"').check();
        cy.get(
            'input[name="student_2[modules][Technisch Keuzemodule]"'
        ).check();

        cy.get('input[id^="question-"]').each(($el) => {
            const id = $el.attr("id");
            cy.wrap($el).type(`${id}: cypress test antwoord`);
        });

        cy.get('input[name="assignment[description]"]').type("opdracht");
        cy.contains("Tussentijds opslaan").click();
    });
});
