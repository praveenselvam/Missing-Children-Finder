
import net.sf.sahi.client.Browser;

public class AtHomePage {

	private Browser browser;

	public AtHomePage(Browser browser) {
		this.browser = browser;
		browser.navigateTo("http://localhost:8080/missing/jsp/");
	}

	public void setUp() throws Exception {
		//This method is executed before the scenario execution starts.
	}

	public void tearDown() throws Exception {
		//This method is executed after the scenario execution finishes.
	}

}
