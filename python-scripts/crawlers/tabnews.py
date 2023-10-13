from models import Article
from requests_html import HTMLSession
from database import engine, Session

dbsession = Session()
session = HTMLSession()
url = 'https://www.tabnews.com.br'

r = session.get(url)

r.html.render(sleep=1)

articles = r.html.find('article')[:5]  # Slice the list to get the first 5 articles
for article in articles:
    # Extract the URL of the article page from the href attribute
    article_url = article.find('a', first=True).attrs['href']

    # Visit the article page
    article_page = session.get(url+article_url)
    article_page.html.render(sleep=1)

    # Extract the title and text from the article page
    title = article_page.html.find('h1', first=True).text  # Get the title from the <h3> element

    # Extract the text from the <div> with class "markdown-body"
    text_div = article_page.html.find('div.markdown-body', first=True)
    text = text_div.text if text_div else "Text not found"

    # Create a new Article object and add it to the database
    new_article = Article(title=title, text=text, source='TabNews', url=url+article_url)
    dbsession.add(new_article)
    dbsession.commit()

    # Print or process the title and text
    print("Title:", title)
    print("Text:", text)

dbsession.close()

