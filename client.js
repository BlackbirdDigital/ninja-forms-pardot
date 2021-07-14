/**
 * Pardot Ninja Forms
 */

function getCookie(n) {
	let a = `; ${document.cookie}`.match(`;\\s*${n}=([^;]+)`);
	return a ? a[1] : "";
}

function NFPardot() {
	if (!Marionette) return;

	var NFPardotFieldController = Marionette.Object.extend({
		initialize: function () {
			this.listenTo(
				Backbone.Radio.channel("fields"),
				"render:view",
				this.initCookie
			);
		},

		initCookie: function (e) {
			if (e.model.get("type") !== "pardot-cookie") return;
			if (typeof piAId === "undefined") return;

			//console.log('found field', e.model);
			//console.log('found piAId', piAId);
			const cookie = `visitor_id${piAId - 1000}`;
			const value = getCookie(cookie);

			e.model.set("value", value);
		},
	});

	new NFPardotFieldController();
}

NFPardot();
