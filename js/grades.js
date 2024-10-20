function updateGrades() {
    const semester = document.getElementById('semester-select').value;
    const tbody = document.querySelector('#grades-table tbody');

    tbody.innerHTML = '';

    let grades = [];

    switch (semester) {
        case '1st_year_1st_sem':
            grades = [
                { course: 'Mathematics', grade: '1.50' },
                { course: 'Art App', grade: '1.75' }
            ];
            break;
        case '1st_year_2nd_sem':
            grades = [
                { course: 'P.E', grade: '1.25' },
                { course: 'Art App', grade: '1.75' }
            ];
            break;
        case '2nd_year_1st_sem':
            grades = [
                { course: 'Data Structures', grade: '1.00' },
                { course: 'Web Development', grade: '1.50' }
            ];
            break;
        case '2nd_year_2nd_sem':
            grades = [
                { course: 'Networking', grade: '2.00' },
                { course: 'Filipino', grade: '1.75' }
            ];
            break;
        case '3rd_year_1st_sem':
            grades = [
                { course: 'Data Structures', grade: '1.25' },
                { course: 'ITSP1', grade: '1.50' }
            ];
            break;
        case '3rd_year_2nd_sem':
            grades = [
                { course: 'Algorithms', grade: '1.75' },
                { course: 'ITSP2', grade: '1.00' }
            ];
            break;
        case '4th_year_1st_sem':
            grades = [
                { course: 'Capstone 1', grade: '1.50' },
                { course: 'Research 1', grade: '1.25' }
            ];
            break;
        case '4th_year_2nd_sem':
            grades = [
                { course: 'Capstone 2', grade: '1.75' },
                { course: 'Research 2', grade: '1.00' }
            ];
            break;
    }

    grades.forEach(grade => {
        const row = `<tr>
            <td>${grade.course}</td>
            <td>${grade.grade}</td>
        </tr>`;
        tbody.innerHTML += row;
    });
}