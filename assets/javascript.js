require(['jquery', 'core/ajax'], function ($, ajax) {
  $(document).ready(function () {

    let selectorByCourse = document.getElementById('courseList');
    let mainSection = document.querySelector('.get-group');
    let studentsSection = document.querySelector('.get-students');


    // основная функция для селкта при клике на селект
    function hendlerSelect(ajaxFunction) {
      let selectorContainerArray = document.querySelectorAll('.custom-select-selected');
      let selectItemArray = document.querySelectorAll('.custom-select-item');
      selectorContainerArray.forEach(item => {
        item.addEventListener('click', toggleIsActiveClass)
      });

      function toggleIsActiveClass() {
        this.parentElement.classList.toggle('is-active-select');
      }

      selectItemArray.forEach(item => {
        item.addEventListener('click', () => {
          let currentItem = item.closest('.custom-dropdown-select').querySelector('.current-select-item');
          currentItem.innerHTML = item.innerHTML;
          let currentCustomSelect = item.closest('.custom-dropdown-select');
          currentCustomSelect.classList.remove('is-active-select');
        })
      })

      selectItemArray.forEach(item => {
        item.addEventListener('click', () => {
          ajaxFunction(item.dataset.id)
        })
      })
    }

    selectorByCourse.addEventListener('click', () => {
      hendlerSelect(ajaxCallGroups);
    })
  
    function ajaxCallGroups(dataid) {
      ajax.call([{
        methodname: 'getGroupsFromBackend',
        args: {
          'id': dataid
        }
      }])[0].done(function (response) {
        mainSection.innerHTML = response;
        let selectByGroups = document.getElementById('groupsid_');
        selectByGroups.addEventListener('click', () => {
          hendlerSelect(ajaxCallStudents);
        });

      }).fail(function (err) {
        console.error(err);
        return;
      });
    }

    // Функция для запроса на студентов группы
    function ajaxCallStudents(dataid) {
      ajax.call([{
        methodname: 'getStudentsGroupFromBackend',
        args: {
          'id': dataid
        }
      }])[0].done(function (response) {
        studentsSection.innerHTML = response;
        let itemsList = document.querySelectorAll('.student-list-item');
        itemsList.forEach(item => {
          item.addEventListener('click', () => {
            ajaxCallItemStudent(item.dataset.id);
          });
        })
      }).fail(function (err) {
        console.error(err);
        return;
      });
    }

    function ajaxCallItemStudent(dataId) {
      ajax.call([{
        methodname: 'getStudentFromBackEnd',
        args: {
          'id': dataId
        }
      }])[0].done(function (response) {
        let studentsItemSection = document.querySelector('.student-item-container');
        studentsItemSection.innerHTML = response;
      }).fail(function (err) {
        console.error(err);
        return;
      });
    }
  })
});
