
// JUnit Assert framework can be used for verification

import static junit.framework.Assert.assertTrue;
import net.sf.sahi.client.Browser;

public class MissingChildSearch {

	private Browser browser;

	public MissingChildSearch(Browser browser) {
		this.browser = browser;
	}

	public void enterSomeInformationAndHitSearch() throws Exception {
		browser.textbox(0).setValue("Kannan");
		browser.radio("radio_gender_male").click();
		browser.textbox(1).setValue("Trichy");
		browser.select(0).choose("3 months");
		browser.submit("Search").click();
	}

	public void theNumberOfChildrenFoundShouldBe(Integer numberOfChildren) throws Exception {
		assertTrue(browser.div(numberOfChildren + " children found").exists());
	}

	public void theChildWithNameShouldBeFoundInTheListOfResults(String nameOfChild)
			throws Exception {
		assertTrue(browser.cell(nameOfChild).isVisible());
	}

	public void theMustBeShownByDefault(String linkName) throws Exception {
		String linkVisibleOnPage = linkName.equals("Grid View") ? "Map View" : "Grid View";
		assertTrue(browser.link(linkVisibleOnPage).isVisible());
	}

}
