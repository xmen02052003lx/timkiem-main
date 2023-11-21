var currentPage = 1
var itemsPerPage = 3

function search() {
  var keyword = document.getElementById("searchKeyword").value
  var xhr = new XMLHttpRequest()

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var result = JSON.parse(this.responseText)
      displayWords(result)
      displayPagination(result.length)
    }
  }

  xhr.open("POST", "index.php?action=search", true)
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("keyword=" + keyword)
}

function addWord() {
  var name = document.getElementById("newWord").value
  var xhr = new XMLHttpRequest()

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("newWord").value = ""
      search()
    }
  }

  xhr.open("POST", "index.php?action=add", true)
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
  xhr.send("name=" + name)
}

function displayWords(words) {
  var wordList = document.getElementById("wordList")
  wordList.innerHTML = ""

  var startIndex = (currentPage - 1) * itemsPerPage
  var endIndex = startIndex + itemsPerPage

  for (var i = startIndex; i < endIndex && i < words.length; i++) {
    var li = document.createElement("li")
    li.appendChild(document.createTextNode(words[i].name))
    wordList.appendChild(li)
  }
}

function displayPagination(totalItems) {
  var totalPages = Math.ceil(totalItems / itemsPerPage)
  var pagination = document.getElementById("pagination")
  pagination.innerHTML = ""

  for (var i = 1; i <= totalPages; i++) {
    var pageLink = document.createElement("a")
    pageLink.href = "#"
    pageLink.innerHTML = i

    if (i === currentPage) {
      pageLink.className = "active"
    }

    pageLink.addEventListener("click", function (event) {
      event.preventDefault()
      currentPage = parseInt(event.target.innerHTML)
      search()
    })

    pagination.appendChild(pageLink)
  }
}
