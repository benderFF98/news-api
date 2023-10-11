from models import Article
from requests_html import HTMLSession
from sqlalchemy.orm import sessionmaker
from database import engine
import asyncio
import pyppeteer

# Create a Pyppeteer event loop (asyncio)
loop = asyncio.get_event_loop()
url = 'https://www.tabnews.com.br/'

# Function to fetch and render a page using Pyppeteer
async def fetch_and_render(url):
    browser = await pyppeteer.launch(headless=True)
    page = await browser.newPage()
    await page.goto(url)
    await page.waitForSelector('article')
    content = await page.content()
    await browser.close()
    return content


if __name__ == "__main__":
    url = 'https://www.tabnews.com.br/'

    # Create an asyncio event loop and run the async function
    loop = asyncio.get_event_loop()
    content = loop.run_until_complete(fetch_and_render(url))

    # You can print or process the 'content' returned by the function here
    print(content)

# # Create a SQLAlchemy session
# Session = sessionmaker(bind=engine)
# dbsession = Session()
#
# session = HTMLSession()
# url = 'https://www.tabnews.com.br/'
#
# r = session.get(url)
#
# r.html.render(sleep=1)
#
# articles = r.html.find('article')[:5]  # Slice the list to get the first 5 articles
# for article in articles:
#     # Extract the URL of the article page from the href attribute
#     article_url = article.find('a', first=True).attrs['href']
#
#     # Visit the article page and render it with Pyppeteer
#     article_page_url = url + article_url
#     article_content = loop.run_until_complete(fetch_and_render(article_page_url))
#
#     # Extract the title and text from the rendered content
#     title = r.html.find('h1', first=True).text  # Get the title from the <h1> element
#
#     # Extract the text from the <div> with class "markdown-body"
#     text_div = r.html.find('div.markdown-body', first=True)
#     text = text_div.text if text_div else "Text not found"
#
#     # Create a new Article object and add it to the database
#     new_article = Article(title=title, text=text, source='TabNews')
#     dbsession.add(new_article)
#     dbsession.commit()
#
#     # Print or process the title and text
#     print("Title:", title)
#     print("Text:", text)
#
# # Close the SQLAlchemy session
# dbsession.close()
