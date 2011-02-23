
// JUnit Assert framework can be used for verification

import static junit.framework.Assert.assertTrue;
import net.sf.sahi.client.Browser;

public class VerifyHomePageComponents {

	private Browser browser;

	public VerifyHomePageComponents(Browser browser) {
		this.browser = browser;
	}

	public void theMasterTitleShouldBe(String headingText) throws Exception {
		assertTrue(browser.heading1(0).containsText(headingText));
	}

	public void theNoticeShowingTheCurrentLocationShouldRead(String locationText)
			throws Exception {
		assertTrue(browser.div("notice").containsHTML(locationText));
	}

	public void theSectionMustBeSeen(String heading) throws Exception {
		assertTrue(browser.heading3(heading).isVisible());
	}
}