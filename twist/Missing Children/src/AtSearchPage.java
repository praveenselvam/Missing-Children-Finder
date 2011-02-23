
import net.sf.sahi.client.Browser;

public class AtSearchPage {

	private Browser browser;

	public AtSearchPage(Browser browser) {
		this.browser = browser;
		browser.navigateTo("http://www.google.co.in");
	}

	public void setUp() throws Exception {
		//This method is executed before the scenario execution starts.
	}

	public void tearDown() throws Exception {
		//This method is executed after the scenario execution finishes.
	}

}
