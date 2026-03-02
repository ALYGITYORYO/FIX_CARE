
// Email list selection
document.addEventListener('DOMContentLoaded', function () {
  const emailList = document.querySelector('.email-list');

  if (emailList) {
    emailList.addEventListener('click', function (e) {
      const item = e.target.closest('.list-group-item-action');
      if (item && emailList.contains(item)) {
        // Remove active from all
        emailList.querySelectorAll('.list-group-item-action.active').forEach(el => {
          el.classList.remove('active');
        });
        // Add active to clicked
        item.classList.add('active');
      }
    });
  }
});

// Handle checkbox selection for email list
document.getElementById('emailCheckAll').addEventListener('change', function () {
  const isChecked = this.checked;
  const checkboxes = document.querySelectorAll('.email-list input[type="checkbox"][id^="emailCheck"]');

  checkboxes.forEach(checkbox => {
    checkbox.checked = isChecked;
  });
});

// Toggle visibility of CC and BCC fields
document.getElementById('showCc').addEventListener('click', function (e) {
  e.preventDefault();
  toggleField('ccEmailWrapper', 'showCc', true);
});

document.getElementById('showBcc').addEventListener('click', function (e) {
  e.preventDefault();
  toggleField('bccEmailWrapper', 'showBcc', true);
});

function toggleField(wrapperId, linkId, show) {
  const wrapper = document.getElementById(wrapperId);
  const link = document.getElementById(linkId);

  if (show) {
    wrapper.classList.remove('d-none');
    link.classList.add('d-none');
  } else {
    wrapper.classList.add('d-none');
    link.classList.remove('d-none');
  }
}