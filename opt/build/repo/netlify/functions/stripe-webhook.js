// netlify/functions/stripe-webhook.js
const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);
const fetch = require('node-fetch');

exports.handler = async (event) => {
  const sig = event.headers['stripe-signature'];

  let eventObject;

  try {
    eventObject = stripe.webhooks.constructEvent(
      event.body,
      sig,
      process.env.STRIPE_WEBHOOK_SECRET
    );
  } catch (err) {
    return {
      statusCode: 400,
      body: `Webhook Error: ${err.message}`,
    };
  }

  if (eventObject.type === 'checkout.session.completed') {
    const session = eventObject.data.object;

    // Értesítés küldése a Discord webhookodra
    const discordWebhookUrl = 'https://discord.com/api/webhooks/1274396520984084592/BTKjlhan6RigfIiCN8kltj8au0rVa1FmB-aZijB0-g_QW_qu8VTvZwEqK0j4ZiGZCnBm';
    
    await fetch(discordWebhookUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        content: `Új sikeres fizetés történt! Részletek: ${JSON.stringify(session)}`
      })
    });
  }

  return {
    statusCode: 200,
    body: JSON.stringify({ received: true }),
  };
};
